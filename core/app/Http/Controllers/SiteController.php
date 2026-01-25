<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SiteController extends Controller
{
    public function index(){

        $page_title   = 'Home';
        //$sections = Page::where('slug','/')->first();
        //$seoContents = $sections->seo_content;
        //$seoImage = @$seoContents->image ? getImage(getFilePath('seo') . '/' . @$seoContents->image, getFileSize('seo')) : null;
        
        view()->share(compact('page_title'));
        return Inertia::render('home', compact('page_title'));
    }

    public function category_details($id)
    {
        $category          = Category::active()->where('id', $id)->with('posts')->firstOrFail();
        $firstCategoryNews = $this->post_query(orderBy: 'desc')->where('category_id', $category->id)->first();
        $category_news     = $this->post_query(orderBy: 'desc')->where('category_id', $category->id)->take(6)->get(['id', 'title', 'image', 'slug', 'created_at']);
        $latest_news       = $this->post_query(orderBy: 'desc')->take(6)->get(['id', 'title', 'image', 'slug', 'created_at']);
        $removeDuplicate   = @$latest_news->first()->id;
        $page_title        = "$category->name Posts";

        $seo_contents      = $category->seoContent;
        $seo_image         = get_image(get_file_path('seo') . '/' . @$category->seo_content->image, get_file_size('seo'));

        view()->share(compact('page_title', 'seo_contents', 'seo_image'));
        return Inertia::render('category/details', compact('page_title', 'category', 'category_news', 'firstCategoryNews', 'latest_news', 'removeDuplicate'));

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
        $posts = Post::active()->approved();
        if ($scope) {
            $posts = $posts->$scope();
        }
        if ($orderBy) {
            $posts = $posts->orderBy('id', $orderBy);
        }
        return $posts;
    }
}
