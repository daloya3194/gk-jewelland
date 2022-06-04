<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Label;
use App\Models\Picture;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['pictures', 'category', 'label'])->get()->all();

        return view('admin.products', [
            'products' => $products,
            'nav' => 'products'
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $labels = Label::all();

        return view('admin.product-create', [
            'categories' => $categories,
            'labels' => $labels,
            'nav' => 'products'
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        $product = Product::create($data);
//        $product->slug = Str::slug($data['name_de']);
//        $product->save();

        if (isset($request['avatar']) && $request['avatar'][0] !== null) {
            foreach ($request['avatar'] as $avatar) {
                Picture::where('path', $avatar)->update(['product_id'=> $product->id]);
            }
        }

        return redirect(route('admin.products', app()->getLocale()));
    }

    public function edit($language, $slug)
    {
        $product = Product::with(['category', 'pictures', 'label'])->where('slug', $slug)->first();
        $categories = Category::all();
        $labels = Label::all();

        return view('admin.product-edit', [
            'product' => $product,
            'categories' => $categories,
            'labels' => $labels,
            'nav' => 'products'
        ]);
    }

    public function update(Request $request, $language, Product $product)
    {
        $data = $this->validator($request->all(), $product)->validate();
        $product->update($data);

        if (isset($request['avatar']) && $request['avatar'][0] !== null) {
            foreach ($request['avatar'] as $avatar) {
                Picture::where('path', $avatar)->update(['product_id'=> $product->id]);
            }
        }

        return redirect(route('admin.products', $language));
    }

    public function delete($language, Product $product)
    {
        $product->delete();

        return redirect(route('admin.products', $language));
    }

    private function validator(array $data, $product = null)
    {
        return Validator::make($data, [
            'category_id' => 'required|numeric',
            'label_id' => 'nullable|numeric',
            'name_en' => ['required', 'string', 'max:256', Rule::unique('products', 'name_en')->ignore($product->id ?? '')],
//            'name_en' => 'required|string|max:256',
            'name_fr' => 'nullable|string|max:256',
            'name_de' => 'nullable|string|max:256',
            'description_en' => 'nullable|string|max:256',
            'description_fr' => 'nullable|string|max:256',
            'description_de' => 'nullable|string|max:256',
            'status' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
    }
}
