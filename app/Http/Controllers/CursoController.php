<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\CursoRepository;

use App\Models\Curso;

class CursoController extends Controller
{
    public function index(){
        $cursos= CursoRepository::findAll(null);
        //$curso=Curso::where('name','HTML')->get();
        return response()-> json($cursos);
    }

    public function show($id){
        $curso= CursoRepository::findById($id);
        return response()-> json($curso);
    }

    public function store(Request $request){
        $curso= CursoRepository::create($request);
        return response()-> json($curso);
    }

    public function update(Request $request,$id){
        $curso=CursoRepository::findById($id);
        $curso->update($request->all());
        return response()-> json($curso);
    }

    public function destroy($id){
        $curso=CursoRepository::findById($id);
        $curso->delete();
    }
}
