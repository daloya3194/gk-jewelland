<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Category extends Component
{
    public $category;
    public $from_price;
    public $to_price;
    public $sort_key;
    public $sort_direction;
    public $price_range = ['0,1000000', '0,25', '25,100', '100,500', '500,1000000'];
    public $price_range_key = 0;
    public $number_of_taking_products = 16;
    public $number_of_products;
    public $sort='price.asc';

    protected $queryString = [
        'price_range_key',
        'sort',
    ];

    public function booted()
    {
        $this->updateData();
    }

    public function updated()
    {
        $this->updateData();
    }

    public function load()
    {
        $this->number_of_taking_products += 8;
    }

    public function render()
    {
        return view('livewire.category', [
            'category_filtered' => $this->category->active_products
                ->whereBetween('price', [$this->from_price, $this->to_price])
                ->sortBy([[$this->sort_key, $this->sort_direction]])
                ->take($this->number_of_taking_products)
        ]);
    }

    private function updateData(): void
    {
        $this->sort_key = explode('.', $this->sort)[0];
        $this->sort_direction = explode('.', $this->sort)[1];

        $this->from_price = explode(',', $this->price_range[$this->price_range_key])[0];
        $this->to_price = explode(',', $this->price_range[$this->price_range_key])[1];

        $this->number_of_products = $this->category->active_products
            ->whereBetween('price', [$this->from_price, $this->to_price])
            ->sortBy([[$this->sort_key, $this->sort_direction]])
            ->count();
    }
}
