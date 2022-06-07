<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 3),
            'label_id' => $this->faker->optional(0.30,null)->numberBetween(1, 1),
            'name_en' => $this->faker->name(),
            'name_fr' => $this->faker->name(),
            'name_de' => $this->faker->name(),
            'description_en' => $this->faker->sentence(),
            'description_fr' => $this->faker->sentence(),
            'description_de' => $this->faker->sentence(),
            'status' => $this->faker->boolean(90),
            'price' => $this->faker->numberBetween(5, 50),
        ];
    }
}
