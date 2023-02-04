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
            'title' => $this->faker->sentence,
            'content' => $this->faker->sentence,
            'image' => 'blog-1.png',
            'date' => '08/09/17',
            'views' => $this->faker->numberBetween(0, 5000),
            'category_id' => 1,
            // 'tag_id' => 3,
            'user_id' => 1,
            'status' => 0,
            'is_featured' => 1,
        ];
    }
}
