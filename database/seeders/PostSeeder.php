<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(3)->create();
        $posts = Post::factory(8)->create();       //Los crea y los almacena en una variable para luego poder recorrer
        foreach ($posts as $post) {
            Image::factory(1)->create([             //aqui me crea la URL  una imagen por cada post
                'imageable_id' => $post->id,         // como estamos iterando sabemos el id del post
                'imageable_type' => Post::class      //me genera esto App\Models\Post
            ]);

            // Asignar etiquetas al post
            $post->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray(),
                [
                    'taggable_type' => Post::class,
                    'taggable_id' => $post->id
                ]
            );
        }
    }
}
