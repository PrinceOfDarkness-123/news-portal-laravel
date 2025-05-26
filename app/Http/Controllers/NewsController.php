<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($id = null) {
        // Get News records to display in first flex items and remaining in carousals
        $firstNews = News::with('category', 'author')->first();
        $nextTwo = News::with('category', 'author')->skip(1)->take(2)->get();
        $twoMore = News::with('category', 'author')->skip(3)->take(2)->get();
        $restOfTheRecords = News::with('category', 'author')->skip(5)->take(PHP_INT_MAX)->get();

        // Get categories list to display in don't miss section
        $firstSevenCategories = Category::take(7)->get();
        $categoryId = $id ?? $firstSevenCategories->first()->id;
        $activeMenu = "category_$categoryId";
        $moreCategories = Category::skip(7)->take(PHP_INT_MAX)->get();

        //Get the Featured News and Small News content in Don't Miss Section
        $featuredNews = News::where('category_id', $categoryId)->latest()->first();
        $smallNews = News::where('category_id', $categoryId)
               ->where('id', '!=', optional($featuredNews)->id)
               ->latest()
               ->take(4)
               ->get();

        //Get Categories list for navbar
        $firstFourCategories = Category::take(4)->get();
        $remainingCategories = Category::skip(4)->take(PHP_INT_MAX)->get();
        //Send all values in view
        return view('news.index', compact('firstNews', 'nextTwo', 'twoMore', 'restOfTheRecords', 'firstSevenCategories', 'moreCategories', 'activeMenu', 'featuredNews', 'smallNews', 'firstFourCategories', 'remainingCategories'));
    }
    public function show($id) {
        $news = News::with('category', 'author')->find($id);
        $categoryid = $news->category_id;
        $activeMenu = "category_$categoryid";
        return view('news.show', compact('news', 'activeMenu'));
    }
}
