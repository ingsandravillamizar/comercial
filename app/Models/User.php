<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    //Relacion 1 a 1
    // Para tomar los datos del autor  cuando se consulte el usuario
    public function author(){
        // $perfil = Author::where('user_id', $this->id)->first;
        // return $perfil;

        return $this->hasOne(Author::class);
        // return $this->hasOne('App\Models\Author');
    }

    //Relacion 1 a muchos
    public function  posts(){
        return $this->hasmany('App\Models\Post');
    }

    //Relacion 1 a muchos
    public function  videos(){
        return $this->hasmany('App\Models\Videos');
    }

    //Relacion muchos a muchos
    public function  roles(){
        return $this->belongsToMany('App\Models\Role');
    }

    //Relacion uno a uno polimorfica
    public function  image(){
        return $this->morphOne('App\Models\Image','imageable');
         //Con el metodo imageable  obtenemos la llave primaria
    }

    //Relacion 1 a muchos entre usuarios y comentarios
    public function comments(){
        return $this->hasmany('App\Models\Comment');
    }

    
}
