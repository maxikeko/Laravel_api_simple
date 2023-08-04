<?php

namespace App\Http\Controllers;
use App\Repository\UserRepository;
use App\Models\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UserController extends Controller
{

    public function index(){
        //$usuarios= User::all();
        $usuarios= UserRepository::findAll(null);
        //$usuario=User::where('name','jose')->get();
        return response()-> json($usuarios);

    }

    public function show($id){

        //$usuario= User::find($id);
        $usuario= UserRepository::findById($id);
	    return response()-> json($usuario);
    }

    public function store(Request $request){
    //     $usuario = new User();
    //     $usuario->name=$request->name;
    //     $usuario->email=$request->email;
    //    // $usuario->email_verified_at= now(); //probar
    //     $usuario->password=$request->password;
    //    // $usuario->remember_token = Str::random(10); //probar
    //     $usuario->save();

        //altenartiva si nos pasan json desde el front
        $usuario= UserRepository::create($request);
        return response()-> json($usuario);
       // return redirect()->route("users/{".$usuario->id ."}",[UserController::class, 'show']);
    }

    public function update(Request $request,$id){


        //$id=$request["id"];
        $usuario=UserRepository::findById($id);
        //  $usuario->name=$request->name;
        //  $usuario->email=$request->email;
        //  //$usuario->email_verified_at= now(); //probar
        //  $usuario->password=$request->password;
        // // $usuario->remember_token = Str::random(10); //probar
        //  $usuario->save();
        $usuario->update($request->all());
        //return response()-> json($request-> all());
        return response()-> json($usuario);
    }

    public function destroy($id){
        $usuario=UserRepository::findById($id);
        $usuario->delete();
    }

    public function showProfile($id){
        $usuario= UserRepository::findById($id);
        $perfil= $usuario->profile;
        return response()-> json($perfil);
    }

    public function showPosts($id){
        $usuario= UserRepository::findById($id);
        $posteos= $usuario->posts;
        return response()-> json($posteos);
    }
}
