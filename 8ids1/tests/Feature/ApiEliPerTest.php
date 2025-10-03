<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiEliPerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_eliminar_permiso(): void
    {
        $PermiElim=[
            'id'=>26,
        ];
        $response = $this->post('/api/permisos/eliminar',$PermiElim);

        $response->assertStatus(200);
    }
}
