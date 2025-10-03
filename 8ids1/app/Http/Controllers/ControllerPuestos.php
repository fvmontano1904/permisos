<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivPues;
use App\Models\puestos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ControllerPuestos extends Controller
{
    public function vista(Request $req){
        if($req->id){
            $puesto_var = puestos::find($req->id);
        }else{
            $puesto_var = new puestos();
        }
        
        return view('puesto',compact('puesto_var'));
    }
    public function crear(StoreDivPues $req){
        if($req->id !=0){
            $puesto_var = puestos::find($req->id);
        }else{
            $puesto_var = new puestos();
            Log::info('Se está creando una nuevo puesto ');	
        }
       
        $puesto_var->codigo = $req->codigo;
        $puesto_var->nombre = $req->nombre;
        $puesto_var->save();

        Log::debug('Detalles del puesto guardado: ', [
            'Id'=> $puesto_var->id,
            'Codigo' => $puesto_var->codigo,
            'Nombre' => $puesto_var->nombre,]);	
    
        log::info('se guardo correctamente el puesto con código: ' . $puesto_var->codigo);


        return redirect()->to('puestos');
    }
    public function lista(){
        $puesto_var = puestos::all();

        return view('puestos', compact('puesto_var'));
    }
    public function eliminar($id){
        $div = puestos::find($id);
        $div->delete();
        log::info('se eliminó el puesto con nombre: ' . $div->nombre);
        return redirect()->route('puesto.lista');
    }
}
