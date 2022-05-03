<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

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
}
