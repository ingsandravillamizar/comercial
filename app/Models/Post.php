<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    
    protected $guarded =['id','created_at', 'updated_at'];    //Para que me permita modificacion masiva


    //Relacion Uno a muchos Post Users
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //relacion de 1 a muchos
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    //Relacion uno a uno polimorfica
    public function  image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
        //Con el metodo imageable  obtenemos la llave primaria
    }

    //Relacion uno a muchos polimorfica
    public function comments()
    {
        return $this->morphToMany('App\Models\Comment', 'commentable');
    }

    //Relacion Polimorfica muchos a muchos
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
