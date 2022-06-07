<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'folder' => $this->faker->name(),
            'filename' => $this->faker->name(),
            'path' => 'https://picsum.photos/300',
            'complete_path' => 'https://picsum.photos/300',
        ];
    }
}
