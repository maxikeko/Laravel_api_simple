<?php
namespace App\Repository;
use App\Models\Categoria;

class CategoriaRepository
{
    public static function findAll($limit){
        if($limit != null){
            return Categoria::orderBy('id','desc')->paginate($limit);
        }
        else{

            return Categoria::orderBy('id','desc')->paginate(5);

        }
    }
    public static function findById($id){
        return Categoria::find($id);

    }

    public static function create($request){
        return Categoria::create($request->all());
    }

}
