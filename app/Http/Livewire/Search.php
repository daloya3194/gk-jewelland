<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public $products;
    public $from_price = 0;
    public $to_price = 1000000;
    public $price_range = ['0,1000000', '0,25', '25,100', '100,500', '500,1000000'];
    public $price_range_key = 0;
    public $sort_key = 'price';
    public $sort_direction = 'asc';

    public function updated()
    {
        $search = '%' . $this->query . '%';

        $this->from_price = explode(',', $this->price_range[$this->price_range_key])[0];
        $this->to_price = explode(',', $this->price_range[$this->price_range_key])[1];

        if (strlen($this->query) > 1) {
            $this->products = Product::withAll()
                ->where('name_' . app()->getLocale(), 'like', $search)
                ->orWhere('description_' . app()->getLocale(), 'like', $search)
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name_' . app()->getLocale(), 'like', $search);
                })
                ->when($this->price_range_key, function ($query) {
                    $query->whereBetween($this->sort_key, [$this->from_price, $this->to_price]);
                })
                ->when($this->sort_direction, function ($query) {
                    $query->orderBy($this->sort_key, $this->sort_direction);
                })
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
