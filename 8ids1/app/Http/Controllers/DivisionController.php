<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivPues;
use App\Models\division;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Log;


class DivisionController extends Controller
{
    public function index(Request $req){
        if($req->id){
            $div = division::find($req->id);
        }else{
            $div = new division();
        }
        
        return view('division',compact('div'));
    }
   /* public function division(){
        return view('division');
    }*/
    public function store( StoreDivPues $req){
        
        if($req->id !=0){
            $div = division::find($req->id);
        }else{
            $div = new division();
            Log::debug('Se está creando una nueva división.');	
        }
       
        $div->codigo = $req->codigo;
        $div->nombre = $req->nombre;
        $div->save();

        Log::debug('Detalles de la división guardada: ', [
        'Id'=> $div->id,
        'Codigo' => $div->codigo,
        'Nombre' => $div->nombre,]);	

        //Log de que se guardo correctamente
        log::info('se guardo correctamente la division con código' . $div->codigo);

        return redirect()->to('divisiones');

        }
        
    public function list(){
        $divisiones = division::all();
        return view('divisiones', compact('divisiones'));
    }

    public function eliminar($id){
        $div = division::find($id);
        $div->delete();
        log::info('se eliminó la division con nombre: ' . $div->nombre);

        return redirect()->route('division.lista');
    }
    
}
