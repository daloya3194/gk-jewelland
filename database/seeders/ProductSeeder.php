<?php

namespace Database\Seeders;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(200)
            ->create()
            ->each(function ($product) {
                Picture::factory(3)
                    ->create(['product_id' => $product->id]);
            });
    }
}
