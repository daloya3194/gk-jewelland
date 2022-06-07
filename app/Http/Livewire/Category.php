<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Category extends Component
{
    public $category;
    public $from_price = 0;
    public $to_price = 1000000;
    public $sort_key = 'price';
    public $sort_direction = 'asc';
    public $price_range = ['0,1000000', '0,25', '25,100', '100,500', '500,1000000'];
    public $price_range_key = 0;
    public $number_of_taking_products = 16;
    public $number_of_products;

    protected $queryString = [
        'from_price',
        'to_price',
        'sort_direction',
    ];

    public function booted()
    {
        $this->number_of_products = $this->category->active_products
            ->whereBetween($this->sort_key, [$this->from_price, $this->to_price])
            ->sortBy([[$this->sort_key, $this->sort_direction]])->count();
    }

    public function updated()
    {
        $this->from_price = explode(',', $this->price_range[$this->price_range_key])[0];
        $this->to_price = explode(',', $this->price_range[$this->price_range_key])[1];
        $this->number_of_products = $this->category->active_products
            ->whereBetween($this->sort_key, [$this->from_price, $this->to_price])
            ->sortBy([[$this->sort_key, $this->sort_direction]])->count();
    }

    public function load()
    {
        $this->number_of_taking_products += 8;
    }

    public function render()
    {
        return view('livewire.category', [
            'category_filtered' => $this->category->active_products
                ->whereBetween($this->sort_key, [$this->from_price, $this->to_price])
                ->sortBy([[$this->sort_key, $this->sort_direction]])
                ->take($this->number_of_taking_products)
        ]);
    }
}
