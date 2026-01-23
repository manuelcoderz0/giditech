<?php

namespace App\Http\Controllers;

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
}
