<?php

namespace Tests\Feature;

use App\Models\PrincipioActivo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PrincipioActivoTest extends TestCase
{
    use RefreshDatabase;

    public function testPrincipioActivoList()
    {
        $principioActivo = PrincipioActivo::factory()->make();
        $principioActivo->save();
        $response = $this->get('api/principioactivo/list');
        $response->assertStatus(200)
        ->assertJson(['principioActivos' => [ 0 =>
            ['nombre' => $principioActivo->nombre]
        ]]); 
    }

    public function testPrincipioActivoGet()
    {
        $principioActivo = PrincipioActivo::factory()->make();
        $principioActivo->save();
        $response = $this->post('api/principioactivo/get', ['id' => $principioActivo->id]);
        $response->assertStatus(200)
        ->assertJson(['principioActivo' =>
            ['nombre' => $principioActivo->nombre]
        ]); 
    }

    public function testPrincipioActivoStore()
    {
        $response = $this->post('api/principioactivo/store', [
            'nombre' => 'test'
        ]);
        $response->assertStatus(200)
        ->assertJsonFragment([
            'resultados' => 'ok',
        ]);

        $principioActivo = DB::table('principio_activos')
        ->orderBy('id')
        ->get()->first();

        $this->assertNotNull($principioActivo);
    }

    public function testPrincipioActivoUpdate()
    {
        $principioActivo = PrincipioActivo::factory()->make();
        $principioActivo->save();
        $response = $this->post('api/principioactivo/update', [
            'id' => $principioActivo->id,
            'nombre' => 'test'
        ]);
        $response->assertStatus(200)
        ->assertJsonFragment([
            'resultados' => 'ok',
        ]);

        $principioActivo->refresh();
        $this->assertEquals($principioActivo->nombre, 'test');
    }
}
