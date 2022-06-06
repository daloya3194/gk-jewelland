<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($language, $slug)
    {
        $category = Category::with(['active_products.pictures'])->where('slug', $slug)->first();

        return view('category', [
            'category' => $category,
            'navigation' => $category->slug
        ]);
    }
}
