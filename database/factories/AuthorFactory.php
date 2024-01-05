<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'bio'=> fake()->text(),
            'website'=> fake()->url(),
            // 'user_id' => \App\Models\User::all()->random()->id,
            'user_id' => function () { return User::factory()->create()->id; },
                
        ];
    }
}
