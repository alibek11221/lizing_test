<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => $this->faker->realText(10),
            'content' => $this->faker->realText(400),
            'likes_counter' => $this->faker->randomNumber(),
            'views_counter' => $this->faker->randomNumber(),
            'image_url' => 'https://picsum.photos/200/300'
        ];
    }
}
