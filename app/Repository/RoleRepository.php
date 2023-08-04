<?php
namespace App\Repository;
use App\Models\Role;

class RoleRepository
{
    public static function findAll($limit){
        if($limit != null){
            return Role::orderBy('id','desc')->paginate($limit);
        }
        else{

            return Role::orderBy('id','desc')->paginate(5);

        }
    }
    public static function findById($id){
        return Role::find($id);

    }

    public static function create($request){
        return Role::create($request->all());
    }

}
