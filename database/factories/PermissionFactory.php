<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
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
             //user
             'create_user' => 1,
             'view_user' => 1,
             'edit_user' => 1,
             'delete_user' => 1,
             //post
             'create_post' => 1,
             'view_post' => 1,
             'edit_post' => 1,
             'delete_post' => 1,
             //tag
             'create_tag' => 1,
             'edit_tag' => 1,
             'delete_tag' => 1,
             //ads
             'create_ads' => 1,
             'view_ads' => 1,
             'edit_ads' => 1,
             'delete_ads' => 1,
             //slider
             'create_slider' => 1,
             'view_slider' => 1,
             'edit_slider' => 1,
             'delete_slider' => 1,
        ];
    }
}
