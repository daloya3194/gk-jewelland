<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($language, $slug)
    {
        $category = Category::with(['products.pictures'])->where('slug', $slug)->first();
//        $products = Product::with(['pictures'])->where('category', $category->id)->get();
//        $products = $category->products()->with(['pictures'])->get();

//        dd($category->products, $products);

        return view('category', [
            'category' => $category,
            'navigation' => $category->slug
        ]);
    }
}
