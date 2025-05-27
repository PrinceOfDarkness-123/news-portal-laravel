<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category_id) {
        $category = Category::findOrFail($category_id); // This will return 404 if not found
        $category_name = $category->name;
        $newsByCategory = News::with('category', 'author')->where('category_id', $category_id)->latest()->paginate(5);
        $activeMenuForCategory = "category_$category_id";
        //Get Categories list for navbar
        $firstFourCategories = Category::take(4)->get();
        $remainingCategories = Category::skip(4)->take(PHP_INT_MAX)->get();
        if ($newsByCategory->isEmpty()) {
            return view('category.404', compact('activeMenuForCategory', 'category_name', 'firstFourCategories', 'remainingCategories'));
        } else {
            return view('category.index', compact('newsByCategory', 'activeMenuForCategory', 'category_name', 'firstFourCategories', 'remainingCategories'));
        }
    }
}
