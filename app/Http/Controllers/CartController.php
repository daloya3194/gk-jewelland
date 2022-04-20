<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        dd(session('cart'));

        return view('cart', [
            'navigation' => 'cart'
        ]);
    }

    public function add(Request $request, $language, $product_id)
    {
        $data = $this->validator($request->all())->validate();

        $product = Product::find($product_id);

        $cart = Cart::where('product_id', $product_id)->first();

        if (isset($cart)) {

            $cart->user_id = \Auth::id() ?? null;
            $cart->quantity = $cart->quantity + $data['quantity'];
            $cart->price = $product->price * $cart->quantity;
            $cart->save();

        } else {

            $cart = Cart::create([
                'user_id' => \Auth::id() ?? null,
                'product_id' => $product_id,
                'quantity' => $data['quantity'],
                'price' => $product->price * $data['quantity'],
            ]);
        }

        session()->put('cart', Cart::all());

        return redirect(route('show.product', [$language, $product->slug]));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'quantity' => 'required|numeric',
        ]);
    }
}
