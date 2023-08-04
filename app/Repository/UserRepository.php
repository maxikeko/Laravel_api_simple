<?php
namespace App\Repository;
use App\Models\User;

class UserRepository
{
    public static function findAll($limit){
        if($limit != null){
            return User::orderBy('id','desc')->paginate($limit);
        }
        else{

            return User::orderBy('id','desc')->paginate(5);

        }
    }
    public static function findById($id){
        return User::find($id);

    }

    public static function create($request){
        return User::create($request->all());
    }

}
