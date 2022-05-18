<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public $products = [];

    public function updatedQuery()
    {
        $search = '%' . $this->query . '%';

        if (strlen($this->query) > 1) {
            $this->products = Product::withAll()
                ->where('name', 'like', $search)
                ->orWhere('description', 'like', $search)
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'like', $search);
                })
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
