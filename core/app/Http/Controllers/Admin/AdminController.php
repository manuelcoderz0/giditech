<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\CurlRequest;
use App\Models\AdminNotification;
use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class AdminController extends Controller {

    public function dashboard() {
        $page_title = 'Dashboard';
        view()->share(compact('page_title'));
        return Inertia::render('admin/dashboard', compact('page_title'));
    }

    public function profile() {
        $page_title = "Profile";
        $admin     = auth('admin')->user();
        return Inertia::render('admin/profile', [
            'title' => $page_title,
            'admin' => $admin
        ]);
    }

    public function profileUpdate(Request $request) {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'image' => 'nullable',
        ]);
        $user = auth('admin')->user();

        if ($request->hasFile('image')) {
            validator(['image' => $request->image], [
                'image' => [new FileTypeValidate(['jpg','jpeg','png','webp'])]
            ])->validate();
            try {
                $old         = $user->image;
                $user->image = fileUploader($request->image, getFilePath('adminProfile'), getFileSize('adminProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();
        $notify[] = ['success', 'Profile updated successfully'];
        return to_route('admin.profile')->withNotify($notify);
    }

    public function password() {
        $page_title = 'Password Setting';
        $admin     = auth('admin')->user();
        return Inertia::render('admin/password', [
            'title' => $page_title,
            'admin' => $admin
        ]);
    }

    public function passwordUpdate(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'password'     => 'required|min:5|confirmed',
        ]);

        $user = auth('admin')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'Password doesn\'t match!!'];
            return back()->withNotify($notify);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        $notify[] = ['success', 'Password changed successfully.'];
        return to_route('admin.password')->withNotify($notify);
    }

    public function notifications() {
        $notifications   = AdminNotification::orderBy('id', 'desc')->with('user')->paginate(getPaginate());
        $has_unread       = AdminNotification::where('is_read', Status::NO)->exists();
        $has_notification = AdminNotification::exists();
        $page_title       = 'Notifications';

        return Inertia::render('admin/notifications', compact('page_title', 'notifications', 'has_unread', 'has_notification'));
    }

    public function notificationRead($id) {
        $notification          = AdminNotification::findOrFail($id);
        $notification->is_read = Status::YES;
        $notification->save();
        $url = $notification->click_url;
        if ($url == '#') {
            $url = url()->previous();
        }
        return redirect($url);
    }

    public function readAllNotification() {
        AdminNotification::where('is_read', Status::NO)->update([
            'is_read' => Status::YES,
        ]);
        $notify[] = ['success', 'Notifications read successfully'];
        return back()->withNotify($notify);
    }

    public function deleteAllNotification() {
        AdminNotification::truncate();
        $notify[] = ['success', 'Notifications deleted successfully'];
        return back()->withNotify($notify);
    }

    public function deleteSingleNotification($id) {
        AdminNotification::where('id', $id)->delete();
        $notify[] = ['success', 'Notification deleted successfully'];
        return back()->withNotify($notify);
    }

    public function downloadAttachment($fileHash) {
        $filePath  = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $title     = slug(gs('site_name')) . '- attachments.' . $extension;
        try {
            $mimetype = mime_content_type($filePath);
        } catch (\Exception $e) {
            $notify[] = ['error', 'File does not exists'];
            return back()->withNotify($notify);
        }
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }



    public function checkSlug(Request $request){

    	$validator = Validator::make($request->all(), [
            'input' => 'required',
            'product_id' => 'sometimes|exists:products,id',
            'id' => 'nullable|exists:service_categories,id',
            'model_type' => 'required|in:service_category,product',
            'category_id' => 'sometimes|exists:service_categories,id'
        ]);
     
        if(!$validator->passes()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }
     
        if($request->model_type == 'service_category'){
            $serviceCategory = ServiceCategory::where('slug', $request->input)->when($request->id, function($query) use ($request){
                $query->where('id', '!=', $request->id);
            })->first();

            if($serviceCategory){
                return ['success'=>false, 'message'=>'This slug is already used'];
            }

            return ['success'=>true, 'message'=>'OK'];
        }

        $product = Product::where('slug', $request->input)->where('category_id', $request->category_id)->when($request->product_id, function($query) use ($request){
            $query->where('id', '!=', $request->product_id);
        })->first();
       
        if($product){
            return ['success'=>false, 'message'=>'This slug is already used'];
        }

        return ['success'=>true, 'message'=>'OK'];
    }

}
