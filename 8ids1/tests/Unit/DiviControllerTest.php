<?php

namespace Tests\Unit;
use App\Http\Controllers\DivisionController;
use App\Http\Requests\StoreDivPues;
use App\Models\division;
use Tests\TestCase;

class DiviControllerTest extends TestCase
{
    /**
     * Estas pruebas tienen como proposito verificr la funcionalidad de los metodos del controlador de division
     */
   /* public function test_crear_division(): void
    {
        // Creamos datos de usuario simulados
        $requestData = [
            'codigo' => 'DIV003',
            'nombre' => 'Biotecnologia',
        ];

        // Creamos una instancia de Request simulada con los datos
        $request = new StoreDivPues($requestData);

        // Creamos una instancia del controlador
        $controller = new DivisionController();

        // Llamamos al método store del controlador con la solicitud simulada
        $response = $controller->store($request);

        // Verificamos que se haya creado una nueva división en la base de datos
        $this->assertDatabaseHas('division', [
            'codigo' => 'DIV003',
            'nombre' => 'Biotecnologia',
        ]);
    }*/
    
    public function test_modificar_division()
    {
        $id = 1; // El ID 
        // Busca el modelo por su ID en la base de datos
        $division = division::find($id);
        if ($division) {
            $requestData = [
                'id' => 3,
                'codigo' => 'DIV003',
                'nombre' => 'Probandoooo',
            ]; 
            // Creamos una instancia de Request simulada con los datos
                $request = new StoreDivPues($requestData);

                // Creamos una instancia del controlador
                $controller = new DivisionController();

                // Llamamos al método store del controlador con la solicitud simulada
                $response = $controller->store($request);
                // Verificamos que se haya creado una nueva división en la base de datos
        $this->assertDatabaseHas('division', [
            'codigo' => 'DIV003',
            'nombre' => 'Probandoooo',
        ]);
                
        } else {
            dump('Error');
        }
    }
    /*
    public function test_eliminar_division(){
        $id = 6; 
        $puesto = division::find($id);
        if ($puesto){
        // Creamos una instancia del controlador
        $controller = new DivisionController();// Llamamos al método store del controlador con la solicitud simulada
        $response = $controller->eliminar($id);
        $this->assertDatabaseMissing('division', [
            'id' => $id
        ]);
        }else{
            dump('No se encontro el ID');
        }
    }*/
    
}
