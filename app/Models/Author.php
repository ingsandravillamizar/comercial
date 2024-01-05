<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    //relacion uno a uno 
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
