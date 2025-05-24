<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $firstNews = News::with('category', 'author')->first();
        $nextTwo = News::with('category', 'author')->skip(1)->take(2)->get();
        $twoMore = News::with('category', 'author')->skip(3)->take(2)->get();
        $restOfTheRecords = News::with('category', 'author')->skip(5)->take(PHP_INT_MAX)->get();
        return view('news.index', compact('firstNews', 'nextTwo', 'twoMore', 'restOfTheRecords'));
    }
    public function show($id) {
        $news = News::with('category', 'author')->find($id);
        $categoryid = $news->category_id;
        $activeMenu = "category_$categoryid";
        return view('news.show', compact('news', 'activeMenu'));
    }
}
