<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiCrearPerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_crear_permiso(): void
    {
        $PermiCrear = [
            'id' => 0,
            'id_usuario' => 1,
            'fecha' => '2024-04-6',
            'motivo' => 'Problemas de salud'
        ];
        
        // Primera solicitud para crear permiso
        $response = $this->post('/api/permisos/crear', $PermiCrear);
        $response->assertStatus(200);
        
        // Si la primera solicitud fue exitosa, intenta hacer otra solicitud
        if ($response->status() == 200) {
            // Hacer una segunda solicitud, utilizando los mismos datos de la primera
            $res = $this->post('/api/permiso');
            $res->assertStatus(200);
        } else {
            //dump imprime mensajes
            dump('La modificacion fallo');
        }
        
    }
}
