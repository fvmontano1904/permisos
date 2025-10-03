<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permisos;
use App\Models\Profesor;
use Illuminate\Support\Facades\Log;

class ControllerPermisos extends Controller
{
    public function modify(Request $req){
        $permiso = Permisos::find($req->id);
        $permiso->estado = $req->estado;//P=pendientes, R=Rechasados, A=aceptados
        $permiso->observaciones = $req->observaciones;
        Log::debug('Se modificó un permiso');	

        $permiso->save();
        return "ok";

    }

    public function crear(Request $req){
        if($req->id == 0){
            $profesor = Profesor::where('id_usuario', $req->id_usuario)->first();
            $permiso = new Permisos();
            $permiso->estado = 'P';
            $permiso->id_profesor = $profesor->id;
        } else {
            $permiso = Permisos::find($req->id);
            Log::debug('Se está creando un nuevo permiso.');	

        }
        $permiso->fecha = $req->fecha;
        $permiso->motivo = $req->motivo;

        Log::debug('Detalles del permiso guardado: ', [
            'Id'=> $permiso->fecha,]);
        log::info('Se guardo correctamente el permiso con id: ' . $permiso->id);

        $permiso->save();
        $arr = array('acceso'=>'OK');
        return json_encode($arr);
    }
    
    
    public function ver_estatus(Request $req) {
        $permisos = Permisos::join('profesor', 'profesor.id', '=', 'permisos.id_profesor')
                            ->where('id_usuario', $req->id_usuario)
                            ->select('permisos.*', 'profesor.nombre as nombre_profesor')
                            ->get();
        
        return json_encode($permisos); // Devuelve los permisos como JSON
    }    

    public function list(Request $req){
        $estatus = Permisos::join('profesor','profesor.id', '=', 'permisos.id_profesor')
        ->where('id_usuario', $req->id_usuario)
        ->select('permisos.*', 'profesor.nombre as nombre_profesor')
        ->get();
        return $estatus; 
    }


    public function solicitud_de_per(){
        $permisos = Permisos::join('profesor', 'profesor.id', '=', 'permisos.id_profesor')
        ->where('permisos.estado', 'P') // Filtrar por estado 'P'
        ->select('permisos.*', 'profesor.nombre as nombre_profesor')
        ->get();
        return view('permisos', compact('permisos'));
    }
    public function ap_permisos(){
        $permisos = Permisos::join('profesor', 'profesor.id', '=', 'permisos.id_profesor')
        ->where('permisos.estado', 'A') // Filtrar por estado 'P'
        ->select('permisos.*', 'profesor.nombre as nombre_profesor')
        ->get();

        return view('permisoslist', compact('permisos'));
    }
    public function re_permisos(){
        $permisos = Permisos::join('profesor', 'profesor.id', '=', 'permisos.id_profesor')
        ->where('permisos.estado', 'R') // Filtrar por estado 'P'
        ->select('permisos.*', 'profesor.nombre as nombre_profesor')
        ->get();
        return view('permisoslist', compact('permisos'));
    }

    public function aprobar_per(Request $r){
        // Busca el permiso por su ID
        $per= Permisos::find($r->id);
        if($per){
            $per->estado = "A";
        $per->observaciones = $r->observaciones;
        Log::debug('Se aprobó un permiso');	
        $per->save();
        return redirect()->to('permisos/solicitud');
        }else{
            return redirect()->back()->with('error', 'El permiso no se encontró.');
            Log::debug('Se aprobó un permiso');	

        }   
    }

    public function rechazar_per(Request $r){
        // Busca el permiso por su ID
        $per= Permisos::find($r->id);
        if($per){
            $per->estado = "R";
        $per->observaciones = $r->observaciones;
        $per->save();
        return redirect()->to('permisos/solicitud');
        }else{
            return redirect()->back()->with('error', 'El permiso no se encontró.');
            Log::debug('Se rechazó un permiso');	

        }   
    }
    
    public function eliminar(Request $req){
        $id = $req->id;
        $div = Permisos::find($id);
        $div->delete();
        Log::debug('Se eliminó un permiso');	
        $arr = array('acceso' => 'OK');
        return json_encode($arr);
    }
     
    public function index(Request $req){
        $permiso = Permisos::find($req->id);
        return $permiso;
    }
    
}