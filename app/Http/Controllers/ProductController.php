<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function show($language, $id)
    {
        return view('product', [
            'product' => Product::find($id)
        ]);
    }

    public function create()
    {
        return view('admin.product-create', [
            'nav' => 'products'
        ]);
    }

    public function store(Request $request) {

//        dd($request->all());
        $data = $this->validator($request->all())->validate();

        $product = Product::create($data);
        $product->slug = Str::slug($data['name']);
        $product->save();

//        dd($product);
        /*$product = Product::create([
            'category_id' => $data['category'],
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'status' => $data['status'],
            'description' => $request->get('description') ?? null,
            'price' => $data['price'],
        ]);*/

        if (isset($request['avatar']) && $request['avatar'][0] !== null) {
            foreach ($request['avatar'] as $avatar) {
                Picture::where('path', $avatar)->update(['product_id'=> $product->id]);
            }
        }

        return redirect(route('admin.products', app()->getLocale()));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'category_id' => 'required|numeric',
            'label_id' => 'nullable|numeric',
            'name' => 'required|string|max:256',
            'description' => 'nullable|string|max:256',
            'status' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
    }
}
