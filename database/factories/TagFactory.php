<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use  Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true); // Genera 2 palabras y las concatena automáticamente
        return [
            'name' =>   $name,
            'slug' => Str::slug($name),
            'color'=> $this->faker->randomElement(['red','blue','green','purple','pink', 'yellow'])
        ];
    }
}
