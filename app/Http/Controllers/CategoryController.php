<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category_id) {
        $newsByCategory = News::with('category')->where('category_id', $category_id)->latest()->paginate(5);
        $category_name = $newsByCategory->first()->category->name;
        $activeMenu = "category_$category_id";
        return view('category.index', compact('newsByCategory', 'activeMenu', 'category_name'));
    }
}
