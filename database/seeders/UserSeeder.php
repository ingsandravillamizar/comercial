<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sandra Milena Villamizar',
            'email'=> 'milena.villamizar@hotmail.com',
            'password' => bcrypt('12345678')
        ]);
        $users = User::factory(5)->create();
        $permissions = Permission::factory(10)->create();
        foreach ($users as $user) {
            Image::factory(1)->create([             //aqui me crea la URL  una imagen por cada post
                'imageable_id' => $user->id,         // como estamos iterando sabemos el id del post
                'imageable_type' => User::class      //me genera esto App\Models\Post
            ]);

            // Asignar roles al usuario
            $role = Role::find(rand(1, 2));
            $user->roles()->attach([$role->id]);
            //$user->roles()->attach([rand(1, 5),]); 

            //Asignar permisos al rol
            $randomPermissions = $permissions->random(rand(1, 5))->pluck('id')->toArray();
            $role->permissions()->attach($randomPermissions);
        }
    }
}
