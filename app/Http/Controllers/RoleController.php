<?php

namespace App\Http\Controllers;

use App\Repository\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){

        $Rol= RoleRepository::findAll(null);

        return response()-> json($Rol);

    }
    public function showRol($id){
        $Rol= RoleRepository::findById($id);

       // $posteos= $Rol->posts;
      //  return response()-> json($posteos);
    }
}
