<?php

namespace Tests\Unit;

use App\Http\Controllers\ControllerPermisos;
use Tests\TestCase;
use Illuminate\Http\Request;


class PermiControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_crear_permiso(): void
    {
        $permisoDatos = [
            'id' => 0,
            'id_usuario' => 1,
            'fecha' => '2024-04-11',
            'motivo' => 'Prueba permiso laravel'
        ];
        $request = new Request($permisoDatos);
        $controller = new ControllerPermisos();

        $response = $controller->crear($request);

        $this->assertDatabaseHas('permisos', [
            'id' => 0,
            'id_usuario' => 1,
            'fecha' => '2024-04-11',
            'motivo' => 'Prueba permiso laravel'
        ]);
    }
    
}
