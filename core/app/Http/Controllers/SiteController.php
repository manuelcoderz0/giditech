<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class SiteController extends Controller
{
    public function index(){

        $page_title   = 'Home - Giditech';
        $sections = Page::where('slug','/')->first();
        $seo_contents = $sections->seo_content;
        $seo_image = @$seo_contents->image ? get_image(get_file_path('seo') . '/' . @$seo_contents->image, get_file_size('seo')) : null;
        
        $last_must_read   = $this->post_query('must_read', 'desc')->with('category')->first();
        $must_read      = $this->post_query('must_read', 'desc')->with('category')->skip(1)->take(2)->get();

        $trending  = $this->post_query('trending', 'desc')->skip(1)->take(3)->get();
        $most_popular   = $this->post_query()->orderByDesc('views')->take(3)->get(['id', 'title', 'image', 'views', 'slug', 'created_at']);

        view()->share(compact('page_title', 'seo_contents', 'seo_image'));
        return Inertia::render('home', compact('page_title', 'last_must_read', 'must_read', 'trending', 'most_popular'));
    }

    public function category_details($slug)
    {
        $category          = Category::active()->where('slug', $slug)->with('posts')->firstOrFail();
        $firstCategoryNews = $this->post_query(orderBy: 'desc')->where('category_id', $category->id)->with('admin')->first();
        $category_posts    = Inertia::scroll(fn () => $this->post_query(orderBy: 'desc')->where('category_id', $category->id)->with('admin')->select(['id', 'title', 'image', 'slug', 'short_description', 'created_at', 'admin_id'])->paginate(6));
 
        $latest_posts       = $this->post_query(orderBy: 'desc')->with('admin')->take(3)->get(['id', 'title', 'image', 'slug', 'views', 'created_at', 'admin_id']);
        $removeDuplicate   = @$latest_posts->first()->id;
        $page_title        = "$category->name Posts";
        
        $seo_contents      = $category->seo_content;
        $seo_image         = get_image(get_file_path('seo') . '/' . @$category->seo_content->image, get_file_size('seo'));
        
        view()->share(compact('page_title', 'seo_contents', 'seo_image'));
        return Inertia::render('category/details', compact('page_title', 'category', 'category_posts', 'firstCategoryNews', 'latest_posts', 'removeDuplicate'));

    }

    public function post_details($slug)
    {
        
        $post = $this->post_query()->with('admin', 'category')->where('slug', $slug)->firstOrFail();
        $post->increment('views');

        $page_title   = $post->title;
        $column       = ['id', 'title', 'image', 'slug', 'views', 'created_at'];
        $top_posts      = $this->post_query()->where('id', '<>', $post->id)->orderByDesc('views')->take(3)->get($column);
        $trending_posts = $this->post_query('trending', 'desc')->where('id', '<>', $post->id)->take(3)->get($column);
        $latest_news  = $this->post_query(orderBy: 'desc')->where('id', '<>', $post->id)->take(6)->get($column);

        $seo_contents['keywords']           = $post->tags ?? [];
        $seo_contents['social_title']       = $post->title;
        $seo_contents['description']        = str_limit(strip_tags($post->short_description), 150);
        $seo_contents['social_description'] = str_limit(strip_tags($post->short_description), 150);
        $seo_image                          = get_image(get_file_path('posts') . '/' . @$post->image, get_file_size('posts'));
        $seo_contents                       = json_decode(json_encode($seo_contents));

        view()->share(compact('page_title', 'seo_contents', 'seo_image'));
        return Inertia::render('post/details', compact('page_title', 'post', 'top_posts', 'trending_posts', 'latest_news'));
    }

    public function placeholder_image($size = null)
    {
        $imgWidth  = explode('x', $size)[0];
        $imgHeight = explode('x', $size)[1];
        $text      = $imgWidth . '×' . $imgHeight;
        $fontFile  = realpath('assets/font/solaimanLipi_bold.ttf');
        $fontSize  = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if ($imgHeight < 100 && $fontSize > 30) {
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 255, 255, 255);
        imagefill($image, 0, 0, $bgFill);
        $textBox    = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    public function post_query($scope = null, $orderBy = null)
    {
        //$posts = Post::active()->approved();
        $posts = Post::active();
        if ($scope) {
            // Convert snake_case to camelCase for scope method
            $scope = Str::camel($scope);
            $posts = $posts->$scope();
        }
        if ($orderBy) {
            $posts = $posts->orderBy('id', $orderBy);
        }
        return $posts;
    }

    public function pages($slug)
    {
        $page        = Page::where('slug', $slug)->firstOrFail();
        $pageTitle   = $page->name;
        $sections    = $page->secs;
        $seoContents = $page->seo_content;
        $seoImage    = @$seoContents->image ? getImage(getFilePath('seo') . '/' . @$seoContents->image, getFileSize('seo')) : null;
        return view('Template::pages', compact('pageTitle', 'sections', 'seoContents', 'seoImage'));
    }

    public function search(Request $request)
    {
        if (!$request->search) {
            return back();
        }
        $search_input = $request->search;
        $search_items = Inertia::scroll(fn () => $this->post_query(orderBy: 'desc')->with('admin', 'category')->searchable(['tags', 'short_description', 'title', 'category:name'])->paginate(6));
        $latest_posts  = $this->post_query(orderBy: 'desc')->with('admin')->take(3)->get(['id', 'title', 'image', 'slug', 'views', 'created_at', 'admin_id']);
        
        $page_title = "Search result for $request->search";
        return Inertia::render('post/search', compact('page_title', 'search_items', 'search_input', 'latest_posts'));

    }

    public function subscribe(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:subscribers,email'
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        $notify[] = ['success', 'Thank you, we will notify you on our latest news'];
        return back()->withNotify($notify);
    }
}
