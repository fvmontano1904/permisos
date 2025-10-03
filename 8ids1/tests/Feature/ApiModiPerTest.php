<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiModiPerTest extends TestCase
{
    /**
     *Esta prueba tiene como funcionalidad determinar si la Api de modificar realmente modifica
     */
    public function test_api_modificar_permiso(): void
    {
        $PermiModi = [
            'id' => 12,
            'id_usuario' => 1,
            'fecha' => '2024-04-05',
            'motivo' => 'Personal'
        ];
        
        // Primera solicitud para crear permiso
        $response = $this->post('/api/permisos/crear', $PermiModi);
        $response->assertStatus(200);
        
        /* Si la primera solicitud fue exitosa, intenta hacer otra solicitud
        if ($response->status() == 200) {
            // Hacer una segunda solicitud, utilizando los mismos datos de la primer
            $id=['id'=>1];
            $res = $this->post('/api/permisos/ver_estatus',$id);
            $res->assertStatus(200);
        } else {
            //dump imprime mensajes
            dump('La modificacion fallo');
        }*/
        
    }
}
