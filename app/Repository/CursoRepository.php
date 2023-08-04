<?php
namespace App\Repository;
use App\Models\Curso;

class CursoRepository
{
    public static function findAll($limit){
        if($limit != null){
            return Curso::orderBy('id','desc')->paginate($limit);
        }
        else{

            return Curso::orderBy('id','desc')->paginate(5);

        }
    }
    public static function findById($id){
        return Curso::find($id);

    }

    public static function create($request){
        return Curso::create($request->all());
    }
}
