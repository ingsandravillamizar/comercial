<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    //Relacion uno a muchos polimorfica
    public function commentable()
    {
        return $this->morphto();
    }

    //Con el metodo imageable  las demas tablas relacionadas obtienen la llave primaria

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
