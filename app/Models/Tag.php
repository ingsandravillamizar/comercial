<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable =['name', 'slug','color'];    //tienen el permiso de la asignacion masiva

    public function getRouteKeyName()
    {
        return 'slug';
    } 


    //Relacion Polimorica muchos a muchos
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }
}
