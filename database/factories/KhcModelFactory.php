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
            'users' => 1,
            'posts' => 1,
            'tags' => 1,
            'ads' => 1,
            'slider' => 1
        ];
    }
}
