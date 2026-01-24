<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function post_data($scope = null)
    {
        if ($scope) {
            $posts = Post::$scope();
        } else {
            $posts = Post::query();
        }
        return $posts->searchable(['title', 'user:username'])
            ->filter(['category_id'])
            ->dateFilter()
            ->with('category', 'user')
            ->orderByDesc('id')
            ->paginate(12);
    }

    public function create()
    {
        $page_title = "Create Post";
        $categories = Category::active()->orderByDesc('id')->get();
        $tinymce_api_key = config('services.tinymce.api_key');
        view()->share(compact('page_title'));
        return Inertia::render('admin/posts/form', compact('page_title', 'categories', 'tinymce_api_key'));
    }

    public function status($id)
    {
        return Post::change_status($id);
    }
}
