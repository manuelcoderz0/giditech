<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $page_title = 'Categories';
        $categories = Category::orderByDesc('id')->paginate(12);
        view()->share(compact('page_title'));
        return Inertia::render('admin/category/index', compact('page_title', 'categories'));
    }

    public function store(Request $request, $id = 0)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $id,
            'description' => 'required|string',
        ]);

        if ($id) {
            $category = Category::findOrFail($id);
            $message = 'Category updated successfully';
        } else {
            $category = new Category();
            $message = 'Category added successfully';
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }

    public function status($id)
    {
        return Category::change_status($id);
    }

    public function seoSetting($id)
    {
        $pageTitle = "SEO Configuration";
        $category = Category::findOrFail($id);
        return view('admin.category.seo', compact('pageTitle', 'category'));
    }

    public function seoStore(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', new FileTypeValidate(['jpeg', 'jpg', 'png'])]
        ]);

        $category = Category::findOrFail($id);
        $image = @$category->seo_content->image;

        if ($request->hasFile('image')) {
            try {
                $image = fileUploader($request->image, getFilePath('seo'), getFileSize('seo'), @$category->seo_content->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload the image'];
                return back()->withNotify($notify);
            }
        }
        $category->seo_content = [
            'image' => $image,
            'description' => $request->description,
            'social_title' => $request->social_title,
            'social_description' => $request->social_description,
            'keywords' => $request->keywords,
        ];
        $category->save();

        $notify[] = ['success', 'SEO content updated successfully'];
        return back()->withNotify($notify);
    }
}
