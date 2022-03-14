<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function create()
    {
        return view('admin.product-create', [
            'nav' => 'products'
        ]);
    }

    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'required|string|max:256',
            'status' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|numeric',
        ]);

        $product = Product::create([
            'category_id' => $data['category'],
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'status' => $data['status'],
            'description' => $request->get('description') ?? null,
            'price' => $data['price'],
        ]);

        if (isset($request['avatar']) && $request['avatar'][0] !== null) {
            foreach ($request['avatar'] as $avatar) {
                Picture::where('path', $avatar)->update(['product_id'=> $product->id]);
            }
        }

        return redirect(route('admin.products', app()->getLocale()));
    }
}
