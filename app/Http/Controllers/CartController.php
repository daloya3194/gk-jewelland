<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;

        return view('cart', [
            'cart' => $cart,
            'navigation' => 'cart'
        ]);
    }

    public function add(Request $request, $language, $product_id)
    {
        $data = $this->validator($request->all())->validate();

        $product = Product::with(['pictures'])->find($product_id);

        $old_cart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new CartService($old_cart);
        $cart->add($product, $product_id, $data['quantity']);

        Session::put('cart', $cart);

        if (Auth::user() !== null) {
            $this->saveCartToDatabase($cart);
        }

        return redirect(route('show.product', [$language, $product->slug]));
    }

    public function remove($language, $product_id) {

        $old_cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new CartService($old_cart);
        $cart->remove($product_id);

        $cart = $cart->total_price > 0 ? $cart : null;

        Session::put('cart', $cart);

        if (Auth::user() !== null) {
            $this->saveCartToDatabase($cart);
        }

        return redirect(route('cart', $language));
    }

    public function updateQuantity(Request $request, $language, $product_id)
    {
        $data = $this->validator($request->all())->validate();

        $old_cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new CartService($old_cart);
        $cart->updateQuantity($product_id, $data['quantity']);

        Session::put('cart', $cart);

        if (Auth::user() !== null) {
            $this->saveCartToDatabase($cart);
        }

        return redirect(route('cart', $language));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'quantity' => 'required|numeric|min:1|max:50',
        ]);
    }

    private function saveCartToDatabase($cart)
    {
        if(Auth::user()->cart()->first() !== null) {
            Cart::destroy(Auth::user()->cart()->first()->id);
        }

        if (isset($cart)) {
            $cart_db = Cart::create([
                'user_id' => Auth::id(),
                'total_quantity' => $cart->total_quantity,
                'total_price' => $cart->total_price,
            ]);

            foreach ($cart->items as $item) {
                CartItem::create([
                    'cart_id' => $cart_db->id,
                    'item' => $item['item']['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        }
    }
}
