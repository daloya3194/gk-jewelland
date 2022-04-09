<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'new_products' => Product::with(['pictures'])->where('label_id', 1)->get()
        ]);
    }
}
