<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;


    //relacion 1 a muchos
    public function posts(){
        return $this->hasMany("App\Models\Post");
    }


}
