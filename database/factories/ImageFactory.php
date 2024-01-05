<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url'=> 'posts/' . $this->faker->image('public/storage/posts',640,480,null,false)
                                                    //Ruta              ,Tamaño ,No categoria, si colocamos tru guarda //public/storage/posts/imagen.jpg
                                                    //si colocamos false solo guarada el nombre de la imagen
                                                    // si queremos al menos una ruta ejemplo posts/imagen.jpg   se coloca al principio 'posts/' 
        ];
    }
}
