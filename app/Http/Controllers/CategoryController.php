<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category_id) {
        $newsByCategory = News::with('category')->where('category_id', $category_id)->latest()->paginate(5);
        $category_name = $newsByCategory->first()->category->name;
        $activeMenuForCategory = "category_$category_id";
        //Get Categories list for navbar
        $firstFourCategories = Category::take(4)->get();
        $remainingCategories = Category::skip(4)->take(PHP_INT_MAX)->get();
        return view('category.index', compact('newsByCategory', 'activeMenuForCategory', 'category_name', 'firstFourCategories', 'remainingCategories'));
    }
}
