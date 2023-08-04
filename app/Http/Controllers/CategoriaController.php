<?php

namespace App\Http\Controllers;
use App\Repository\CategoriaRepository;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index(){

        $categoria= CategoriaRepository::findAll(null);

        return response()-> json($categoria);

    }
    public function showPosts($id){
        $categoria= CategoriaRepository::findById($id);
        $posteos= $categoria->posts;
        return response()-> json($posteos);
    }
}
