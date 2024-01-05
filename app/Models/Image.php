<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    protected $guarded = [];  // no hay ningun campo protegido todos son libres para ingresar informacion de forma masiva

    //Relacion uno a uno polimorfica
    public function imageable(){
        return $this->morphTo();
    }

    
}
