<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Label;
use App\Models\Picture;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
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

    public function addToWishlist($language, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $user = User::find(Auth::id());

        if (!$user->wishlist) {

            $user->wishlist = [$product->id];
            $user->save();

        } else {

            $wishlist = $user->wishlist;

            if(!in_array($product->id, $wishlist)) {
                $wishlist[] = $product->id;
                $user->wishlist = $wishlist;
                $user->save();
            }
        }

        return redirect()->back()->with('success', 'success');
    }

    public function removeToWishlist($language, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $user = User::find(Auth::id());
        $wishlist = $user->wishlist;

        if(in_array($product->id, $wishlist)) {
            Arr::forget($wishlist, array_search($product->id, $wishlist));
            $user->wishlist = $wishlist;
            $user->save();
        }

        return redirect()->back()->with('success', 'success');
    }
}
