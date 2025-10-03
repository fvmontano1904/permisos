<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfeRequest;
use App\Models\Profesor;
use App\Models\puestos;
use App\Models\User;
use App\Models\division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ControllerProfesor extends Controller
{
    public function vista(Request $req){

        $users = User::all();
        $puesto = puestos::all();
        $division = division::all();
        if($req->id){
            $profesor_var = Profesor::find($req->id);
        }else{
            $profesor_var = new Profesor();
        }
        
        return view('profesor',compact('profesor_var', 'users', 'puesto', 'division'));
    }
    public function crear(Request $req){
        if($req->id !=0){
            $profesor_var = Profesor::find($req->id);
        }else{
            $profesor_var = new Profesor();
            Log::info('Se está creando un nuevo profesor ');	

        }
       
        $profesor_var->numero = $req->numero;
        $profesor_var->nombre = $req->nombre;
        $profesor_var->horas_asignadas = $req->horas_asignadas;
        $profesor_var->dias_eco_corre = $req->dias_eco_corre;
        $profesor_var->id_usuario = $req->id_usuario;
        $profesor_var->id_puesto = $req->id_puesto;
        $profesor_var->id_division = $req->id_division;

        Log::debug('Detalles del profesor guardado: ', [
            'Nombre'=> $profesor_var->nombre,
            'Usuario id' => $profesor_var->id_usuario,
            'Division id' => $profesor_var->id_division,]);	
    
            log::info('se guardo correctamente la division con código' . $profesor_var->id_usuario);

        $profesor_var->save();
        return redirect()->to('profesores');
    }


    public function lista(){
        //$profesor_var = Profesor::all();
        $profesor_var = Profesor::join('puestos','profesor.id_puesto','=','puestos.id')
                                ->join('users','profesor.id_usuario','=','users.id')
                                ->select('profesor.*', 'puestos.nombre as nombre_puesto', 'users.name as nombre_usuario')
                                ->get();
        return view('profesores', compact('profesor_var'));
    }
    public function eliminar($id){
        $div = Profesor::find($id);
        $div->delete();
        log::info('se eliminó el profesor con nombre: ' . $div->nombre);
        return redirect()->route('profesor.lista');
    }
}