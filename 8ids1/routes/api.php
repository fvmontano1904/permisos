<?php

use App\Http\Controllers\ControllerPermisos;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Route::post('permiso/modificar',[ControllerPermisos::class,'modify']);
Route::post('permisos/crear',[ControllerPermisos::class,'crear']);
Route::get('ver_estatus',[ControllerPermisos::class,'ver_estatus']);
Route::post('login',[LoginController::class,'login']);
Route::post('permisos/eliminar/',[ControllerPermisos::class,'eliminar']);
Route::post('permisos/modificar/',[ControllerPermisos::class,'modify']);
Route::post('permiso',[ControllerPermisos::class,'index']);
