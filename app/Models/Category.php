<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable =['name', 'slug'];    //tienen el permiso de la asignacion masiva

    public function getRouteKeyName()
    {
       //Sobreescribimos un metodo que ya existe y que por defecto esta configurado para retornar el Id, nosotros le indicamos que retorne el slug
        return 'slug';
    } 

    //Relacion 1 a muchos
    public function  posts()
    {
        return $this->hasmany('App\Models\Post');
    }

    //Relacion 1 a muchos
    public function  videos()
    {
        return $this->hasmany('App\Models\Videos');
    }
}
