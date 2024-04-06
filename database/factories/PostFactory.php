<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => rand(1,10),
            'title' => $this->faker->sentence(1),
            'content' => $this->faker->paragraph(10,true),
            'published_at' => rand(0,1),
        ];
    
    }
}
