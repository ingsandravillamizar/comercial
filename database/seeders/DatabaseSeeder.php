<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');


        \App\Models\Role::factory(2)->create();
       
        $this->call(UserSeeder::class);
        \App\Models\Author::factory(3)->create();

        \App\Models\Category::factory(2)->create();
        // \App\Models\Tag::factory(100)->create();
        $this->call(PostSeeder::class);



    }
}
