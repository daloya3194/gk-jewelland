<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Label;
use App\Models\Picture;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function show($language, $slug)
    {
        $product = Product::with(['pictures', 'category'])->where('slug', $slug)->first();

        return view('product', [
            'product' => $product,
            'navigation' => $product->category->slug
        ]);
    }
}
