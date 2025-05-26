<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        // Get News records to display in first flex items and remaining in carousals
        $firstNews = News::with('category', 'author')->first();
        $nextTwo = News::with('category', 'author')->skip(1)->take(2)->get();
        $twoMore = News::with('category', 'author')->skip(3)->take(2)->get();
        $restOfTheRecords = News::with('category', 'author')->skip(5)->take(PHP_INT_MAX)->get();

        // Get categories list to display in don't miss section
        $firstSevenCategories = Category::take(7)->get();
        $categoryId = $firstSevenCategories->first()->id;
        $activeMenu = "category_$categoryId";
        $moreCategories = Category::skip(7)->take(PHP_INT_MAX)->get();
        $featuredNews = News::where('category_id', $categoryId)->latest()->first();
        $smallNews = News::where('category_id', $categoryId)
               ->where('id', '!=', optional($featuredNews)->id)
               ->latest()
               ->take(4)
               ->get();
        //Send all values in view
        return view('news.index', compact('firstNews', 'nextTwo', 'twoMore', 'restOfTheRecords', 'firstSevenCategories', 'moreCategories', 'activeMenu', 'featuredNews', 'smallNews'));
    }
    public function show($id) {
        $news = News::with('category', 'author')->find($id);
        $categoryid = $news->category_id;
        $activeMenu = "category_$categoryid";
        return view('news.show', compact('news', 'activeMenu'));
    }

    public function loadByCategory($id)
       {
        // Get News records to display in first flex items and remaining in carousals
        $firstNews = News::with('category', 'author')->first();
        $nextTwo = News::with('category', 'author')->skip(1)->take(2)->get();
        $twoMore = News::with('category', 'author')->skip(3)->take(2)->get();
        $restOfTheRecords = News::with('category', 'author')->skip(5)->take(PHP_INT_MAX)->get();

        // Get categories list to display in don't miss section
        $firstSevenCategories = Category::take(7)->get();
        $categoryId = $firstSevenCategories->first()->id;
        $activeMenu = "category_$categoryId";
        $moreCategories = Category::skip(7)->take(PHP_INT_MAX)->get();
        $featuredNews = News::where('category_id', $id)->latest()->first();
        $smallNews = News::where('category_id', $id)
               ->where('id', '!=', optional($featuredNews)->id)
               ->latest()
               ->take(4)
               ->get();
           $isAjax = true;
           return response()->view('news.index', compact('featuredNews', 'smallNews', 'firstNews', 'isAjax', 'firstNews', 'nextTwo', 'twoMore', 'restOfTheRecords', 'firstSevenCategories', 'activeMenu', 'moreCategories'), 200);
       }
}
