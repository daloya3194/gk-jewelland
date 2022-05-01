<?php

namespace App\Services;

class CartService
{
    public $items = null;
    public $total_quantity = 0;
    public $total_price = null;

    public function __construct($old_card)
    {
        if ($old_card) {
            $this->items = $old_card->items;
            $this->total_quantity = $old_card->total_quantity;
            $this->total_price = $old_card->total_price;
        }
    }

    public function add($item, $id, $quantity)
    {
        $stored_item = [
            'quantity' => $quantity,
            'price' => $item->price,
            'item' => $item,
        ];

        if ($this->items) {

            if (array_key_exists($id, $this->items)) {

                $stored_item = $this->items[$id];
                $stored_item['quantity'] += $quantity;

            }
        }

        $stored_item['price'] = $item->price * $stored_item['quantity'];
        $this->items[$id] = $stored_item;

        $total_quantity = 0;
        $total_price = 0;

        foreach ($this->items as $item) {
            $total_quantity += $item['quantity'];
            $total_price += $item['price'];
        }

        $this->total_quantity = $total_quantity;
        $this->total_price = $total_price;
    }

    public function remove($item_id)
    {
        $to_remove = $this->items[$item_id];
        $this->total_quantity -= $to_remove['quantity'];
        $this->total_price -= $to_remove['price'];
        unset($this->items[$item_id]);
    }

    public function updateQuantity($item_id, $new_quantity)
    {
        $item_price = $this->items[$item_id]['item']['price'];
        $this->items[$item_id]['quantity'] = $new_quantity;
        $this->items[$item_id]['price'] = $item_price * $new_quantity;

        $total_quantity = 0;
        $total_price = 0;

        foreach ($this->items as $item) {
            $total_quantity += $item['quantity'];
            $total_price += $item['price'];
        }

        $this->total_quantity = $total_quantity;
        $this->total_price = $total_price;
    }
}
