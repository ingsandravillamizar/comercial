<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use  Illuminate\Support\Str;

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
        $name = $this->faker->unique()->sentence();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'extract' => $this->faker->text(200),
            'body'  => $this->faker->text(2000),
            'status'=> $this->faker->randomElement([1,2]),
            'user_id' => \App\Models\User::all()->random()->id,
            'category_id' => \App\Models\Category::all()->random()->id,
        ];
    }
}
