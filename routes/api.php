<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/", HomeController::class);
//rutas users

Route::get("users",[UserController::class, 'index']);

Route::get("users/{id}",[UserController::class, 'show']);

Route::post("users",[UserController::class, 'store']);

Route::put("users/{id}",[UserController::class, 'update']);

Route::delete("users/{id}",[UserController::class, 'destroy']);

Route::get("users/profile/{id}",[UserController::class,'showProfile']);

Route::get("users/posts/{id}",[UserController::class,'showPosts']);

Route::get("users/roles/{id}",[UserController::class,'showRol']);


//rutas cursos
Route::get("cursos",[CursoController::class, 'index']);

Route::get("cursos/{id}",[CursoController::class, 'show']);

Route::post("cursos",[CursoController::class, 'store']);

Route::put("cursos/{id}",[CursoController::class, 'update']);

Route::delete("cursos/{id}",[CursoController::class, 'destroy']);




Route::get("categorias",[CategoriaController::class, 'index']);

Route::get("categorias/post/{id}",[CategoriaController::class,'showPosts']);



//Roles
Route::get("roles",[RoleController::class, 'index']);

Route::get("roles/users/{id}",[RoleController::class,'showRol']);
