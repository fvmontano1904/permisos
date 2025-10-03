<?php

use App\Http\Controllers\ControllerPermisos;
use App\Http\Controllers\ControllerPuestos;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ControllerProfesor;
use App\Models\division;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nosotros', function(){
    return view('nosotros');
});

Route::get('presentacion', [PresentacionController::class, 'index']);

/*Route::get('login', [FormController::class, 'form']);
Route::post('login', [FormController::class, 'store'])->name('login.store');*/
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('nosotros')->middleware('auth');
///RUTAS PARA ADMINISTRADOR///
Route::group(['middleware' =>['auth','role:admin']],function(){
    //rutas division
    Route::get('/division',[DivisionController::class, 'index']);
    Route::post('/division', [DivisionController::class, 'store'])->name('division.nueva')->middleware('auth');
    Route::delete('/dicisiones/eliminar/{id}',[DivisionController::class, 'eliminar'])->name('division.eliminar')->middleware('auth');
    Route::get('/divisiones', [DivisionController::class,'list'])->name('division.lista')->middleware('auth');
    Route::post('/divisiones', [DivisionController::class,'list'])->name('division.lista')->middleware('auth');
    //rutas puestos
    Route::get('/puesto', [ControllerPuestos::class,'vista'])->middleware('auth');
    Route::post('/puesto', [ControllerPuestos::class,'crear'])->name('puesto.nuevo')->middleware('auth');
    Route::get('/puestos', [ControllerPuestos::class, 'lista'])->name('puesto.lista')->middleware('auth');
    Route::delete('/puestos/elim/{id}', [ControllerPuestos::class, 'eliminar'])->name('puesto.eliminar')->middleware('auth');
    //rutas profesor
    Route::get('/profesor', [ControllerProfesor::class,'vista'])->middleware('auth');
    Route::post('/profesor', [ControllerProfesor::class,'crear'])->name('profesor.nuevo')->middleware('auth');
    Route::get('/profesores', [ControllerProfesor::class, 'lista'])->name('profesor.lista')->middleware(['auth']);
    Route::delete('/profesores/elim/{id}', [ControllerProfesor::class, 'eliminar'])->name('profesor.eliminar')->middleware('auth');
    //logs
 Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware('auth');
});

//permisos
Route::get('/permisos/solicitud', [ControllerPermisos::class,'solicitud_de_per'])->name('permiso.lista')->middleware('auth');
Route::post('/permisos/aprobar', [ControllerPermisos::class,'aprobar_per'])->name('permiso.aprobar')->middleware('auth');
Route::post('/permisos/rechazar', [ControllerPermisos::class,'rechazar_per'])->name('permiso.rechazar')->middleware('auth');
Route::get('/permisos/aprobados', [ControllerPermisos::class,'ap_permisos'])->name('lista.aprobados')->middleware('auth');
Route::get('/permisos/rechazados', [ControllerPermisos::class,'re_permisos'])->name('lista.rechazados')->middleware('auth');


//***Rutas secretaria 
/*
Route::group(['middleware' => ['auth', 'role:secretaria']], function () {
    //permisos
Route::get('/permisos/solicitud', [ControllerPermisos::class,'solicitud_de_per'])->name('permiso.lista')->middleware('auth');
Route::post('/permisos/aprobar', [ControllerPermisos::class,'aprobar_per'])->name('permiso.aprobar')->middleware('auth');
Route::post('/permisos/rechazar', [ControllerPermisos::class,'rechazar_per'])->name('permiso.rechazar')->middleware('auth');
Route::get('/permisos/aprobados', [ControllerPermisos::class,'ap_permisos'])->name('lista.aprobados')->middleware('auth');
Route::get('/permisos/rechazados', [ControllerPermisos::class,'re_permisos'])->name('lista.rechazados')->middleware('auth');
});
*/
/*Route::get('/dicisiones/eliminar',[DivisionController::class, 'eliminar'])->name('division.eliminar');
Route::post('/dicisiones/eliminar',[DivisionController::class, 'eliminar'])->name('division.eliminar');*/




