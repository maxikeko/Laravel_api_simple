<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function name():Attribute{
        return new Attribute(
            get: function($value){
                return ucwords($value);			//funcion para mayusculas en las primeras letras
            },						//recordar la coma,
            set: fn($value) => strtolower($value)	//funcion para modificar en minusculas
            //funcion flecha, forma mas reducida
        );
    }

    //relacion 1 a 1
    public function profile(){
        // $profile = Profile::where("user_id", $this->id)->first;
        // return $profile;
        return $this->hasOne(Profile::class);

    }

    //relacion 1 a muchos
    public function posts(){
        return $this->hasMany("App\Models\Post");
    }

    //relacion muchos a muchos

    public function roles(){
        return $this->belongsToMany("App\Models\Role");
    }
}
