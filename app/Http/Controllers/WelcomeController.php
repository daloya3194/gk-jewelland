<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $new_products = Product::with(['pictures', 'label', 'category'])->where('label_id', 1)->get();

        return view('welcome', [
            'new_products' => $new_products,
            'categories' => $categories,
        ]);
    }
}
