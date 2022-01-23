<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KhcModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'users' => 0,
            'posts' => 0,
            'tags' => 0,
            'ads' => 0,
            'slider' => 0
        ];
    }
}
