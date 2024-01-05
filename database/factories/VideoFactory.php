<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use  Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
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
            'name'      =>$name,
            'slug'      => Str::slug($name),
            'extract'   => $this->faker->text(200),
            'body'      => $this->faker->paragraphs(3, true), // Genera 3 párrafos
            'status'    => $this->faker->randomElement([1, 2]),
            'url'       => 'https://www.youtube.com/watch?v=' . $this->faker->regexify('[a-zA-Z0-9_-]{11}'),
            'user_id'   => \App\Models\User::all()->random()->id, 
            'category_id' =>  \App\Models\Category::all()->random()->id
        ];
    }
}
