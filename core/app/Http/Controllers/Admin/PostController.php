<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $page_title  = "All Posts";
        $posts       = $this->post_data();
        $categories = Category::active()->orderBy('name')->get();
        view()->share(compact('page_title'));
        return Inertia::render('admin/posts/index', compact('page_title', 'posts', 'categories'));
    }

    public function pending()
    {
        $page_title  = "Pending Posts";
        $posts       = $this->post_data('pending');
        $categories = Category::active()->orderBy('name')->get();
        view()->share(compact('page_title'));
        return Inertia::render('admin/posts/index', compact('page_title', 'posts', 'categories'));
    }

    public function approved()
    {
        $page_title  = "Approved Posts";
        $posts       = $this->post_data('approved');
        $categories = Category::active()->orderBy('name')->get();
        view()->share(compact('page_title'));
        return Inertia::render('admin/posts/index', compact('page_title', 'posts', 'categories'));
    }

    public function rejected()
    {
        $page_title = "Rejected Posts";
        $posts = $this->post_data('rejected');
        $categories = Category::active()->orderBy('name')->get();
        view()->share(compact('page_title'));
        return Inertia::render('admin/posts/index', compact('page_title', 'posts', 'categories'));
    }

    public function post_data($scope = null)
    {
        if ($scope) {
            $posts = Post::$scope();
        } else {
            $posts = Post::query();
        }
        return Inertia::scroll(fn () => $posts->searchable(['title', 'admin:username'])->filter(['category_id'])->dateFilter()->with('category', 'admin')->orderByDesc('id')->paginate(12));
    }

    public function create(){
        $page_title = "Create Post";
        $categories = Category::active()->orderByDesc('id')->get();
        $tinymce_api_key = config('services.tinymce.api_key');
        view()->share(compact('page_title'));
        return Inertia::render('admin/posts/form', compact('page_title', 'categories', 'tinymce_api_key'));
    }

    public function edit($id){
        $page_title = "Edit Post";
        $categories = Category::active()->orderByDesc('id')->get();
        $tinymce_api_key = config('services.tinymce.api_key');
        $post = Post::where('id', $id)->firstOrFail();
        view()->share(compact('page_title'));
        return Inertia::render('admin/posts/form', compact('page_title', 'post', 'categories', 'tinymce_api_key'));
    }

    public function store(Request $request, $id = 0)
    {
        //dd($request->all());
        $rules = [
            'category_id'       => 'required|integer|exists:categories,id',
            'title'             => 'required|string',
            'short_description' => 'required',
            'description'       => 'required',
            'video_link'        => 'required_if:have_video,==,on|url',
            'tags'              => 'required|max:60000|array',
        ];

        // Only validate image as file if it's actually being uploaded
        if ($request->file('image')) {
            $rules['image'] = ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])];
        } else {
            $rules['image'] = [$id ? 'nullable' : 'required'];
        }

        $request->validate($rules);

        if ($id) {
            $post = Post::findOrFail($id);
            $message = 'Post updated successfully';
        } else {
            $post = new Post();
            $message = 'Post created successfully';
        }

        if ($request->file('image')) {
            @$old = $post->image;
            try {
                $post->image =  file_uploader($request->file('image'), get_file_path('posts'), get_file_size('posts'), @$old);
            } catch (\Exception $exp) {
                throw ValidationException::withMessages(['error' => 'Couldn\'t upload your image']);
            }
        }

        $purifier                = new \HTMLPurifier();
        $post->admin_id          = auth('admin')->id();
        $post->admin_check       = Status::POST_APPROVED;
        $post->category_id       = $request->category_id;
        $post->title             = $request->title;
        $post->slug              = slug($request->title);
        $post->short_description = $request->short_description;
        $post->description       = htmlspecialchars_decode($purifier->purify($request->description));
        $post->tags              = $request->tags;
        $post->have_video        = $request->have_video == 'on' ? Status::YES : Status::NO;
        $post->video_link        = $request->have_video == 'on' ? $request->video_link : null;
        $post->trending          = $request->trending == 'on' ? Status::YES : Status::NO;
        $post->must_read         = $request->must_read == 'on' ? Status::YES : Status::NO;
        $post->status            = $request->status == 'on' ? Status::YES : Status::NO;
        $post->save();

        $notify[] = ['success', $message];
        return back()->withNotify($notify);
    }

    public function status($id){
        return Post::change_status($id);
    }
}
