<?php

namespace Tests\Unit;

use App\Http\Controllers\ControllerPuestos;
use App\Http\Controllers\DivisionController;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDivPues;

use App\Models\puestos;
use Tests\TestCase;

class PuestosControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_crear_puesto(): void
    {
        // Creamos datos de usuario simulados
        $puestoDatos = [
            'codigo' => 'PUE003',
            'nombre' => 'Jefe de academia',
        ];

        // Creamos una instancia de Request simulada con los datos
        $request = new StoreDivPues($puestoDatos);
        // Creamos una instancia del controlador
        $controller = new ControllerPuestos();

        // Llamamos al método store del controlador con la solicitud simulada
        $response = $controller->crear($request);
        // Verificamos que se haya creado una nueva división en la base de datos
        $this->assertDatabaseHas('puestos', [
            'codigo' => 'PUE003',
            'nombre' => 'Jefe de academia',
        ]);
    }
    /*
    public function test_modificar_puetso(){
        $id = 1; // El ID que deseas verificar
        // Busca el modelo por su ID en la base de datos
        $puesto = puestos::find($id);
        if ($puesto) {
            $puestoDatos = [
                'id'=>2,
                'codigo' => 'PUE002',
                'nombre' => 'Puesto actualizado',
            ];
             // Creamos una instancia de Request simulada con los datos
        $request = new Request($puestoDatos);

        // Creamos una instancia del controlador
        $controller = new ControllerPuestos();

        // Llamamos al método store del controlador con la solicitud simulada
        $response = $controller->crear($request);
        $this->assertDatabaseHas('puestos', [
            'codigo' => 'PUE002',
            'nombre' => 'Puesto actualizado',
        ]);
        } else {
            dump('Id no encontrado');
        }
    }
    public function test_eliminar_puesto(){
        $id = 6; 
        $puesto = puestos::find($id);
        if ($puesto){
        // Creamos una instancia del controlador
        $controller = new ControllerPuestos();// Llamamos al método store del controlador con la solicitud simulada
        $response = $controller->eliminar($id);
        $this->assertDatabaseMissing('puestos', [
            'id' => $id
        ]);
        }else{
            dump('No se encontro el ID');
        }
    }*/
    
}
