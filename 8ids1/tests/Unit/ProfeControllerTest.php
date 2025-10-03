<?php

namespace Tests\Unit;

use App\Http\Controllers\ControllerProfesor;
use App\Models\Profesor;
use App\Http\Requests\ProfeRequest;
use Tests\TestCase;
class ProfeControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_crear_profesor(): void
    {
       $profesorDatos=[
        'numero'=>'PRO003',
        'nombre'=>'Ricardo Juarez Quezada',
        'horas_asignadas'=>'30',
        'dias_eco_corre'=>'2',
        'id_usuario'=>1,
        'id_puesto'=>1,
        'id_division'=>2,
       ];//datos de prueba
       $request=new ProfeRequest($profesorDatos);//simulamos un request
       $controlador=new ControllerProfesor;//instancia para el controlador
       $response = $controlador->crear($request);//llamamos el metodo crear con la solicitud simulada
       // Verificamos que se haya creado un nuevo profesor en la base de datos
       $this->assertDatabaseHas('profesor', [
        'numero'=>'PRO003',
        'nombre'=>'Ricardo Juarez Quezada',
        'horas_asignadas'=>'30',
        'dias_eco_corre'=>'2',
        'id_usuario'=>1,
        'id_puesto'=>1,
        'id_division'=>2,
    ]);
    }
    /*
    public function test_modificar_profesor(){
        $id = 1; // El ID 
        $profesor = Profesor::find($id); // Busca el modelo por su ID en la base de datos
        if($profesor){
            $profesorDatos=[
                'id'=>2,
                'numero'=>'PRO002',
                'nombre'=>'Julian Medina Lopez',
                'horas_asignadas'=>'23',
                'dias_eco_corre'=>'7',
                'id_usuario'=>1,
                'id_puesto'=>1,
                'id_division'=>2,
               ];
               $request = new ProfeRequest($profesorDatos);
               $controlador = new ControllerProfesor();
               $response = $controlador->crear($request);
               $this->assertDatabaseHas('profesor', [
                'numero'=>'PRO002',
                'nombre'=>'Julian Medina Lopez',
                'horas_asignadas'=>'23',
                'dias_eco_corre'=>'7',
                'id_usuario'=>1,
                'id_puesto'=>1,
                'id_division'=>2,
            ]);
        }else{
            dump('No se encontro el ID');
        }
    }
    public function test_eliminar_profesor(){
        $id = 5; 
        $puesto = Profesor::find($id);
        if ($puesto){
        // Creamos una instancia del controlador
        $controller = new ControllerProfesor();// Llamamos al método store del controlador con la solicitud simulada
        $response = $controller->eliminar($id);
        $this->assertDatabaseMissing('profesor', [
            'id' => $id
        ]);
        }else{
            dump('No se encontro el ID');
        }
    }*/
}
