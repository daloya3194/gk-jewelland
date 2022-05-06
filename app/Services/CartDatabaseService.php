<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartDatabaseService
{
    public static function createCart($cart, $id_name, $id)
    {
        $cart_db = Cart::create([
            $id_name => $id,
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

    public static function putCartFromDatabaseToSession($cart)
    {
        \session()->remove('cart');

        foreach ($cart->items()->get() as $item) {

            $old_cart = Session::has('cart') ? Session::get('cart') : null;

            $product = Product::with(['pictures'])->find($item['item']);

            $cart = new CartService($old_cart);
            $cart->add($product, $item['item'], $item['quantity']);
            Session::put('cart', $cart);
        }
    }

    public static function saveCartUserToDatabase($cart)
    {
        if(Auth::user()->cart()->first() !== null) {
            Cart::destroy(Auth::user()->cart()->first()->id);
        }

        if (isset($cart)) {
            self::createCart($cart, 'user_id', Auth::id());
        }
    }
}
