<?php

namespace Tests\Feature;

use App\Models\PrincipioActivo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PrincipioActivoTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexPrincipioActivo()
    {
        $response = $this->get('/principioactivo');
        $response->assertStatus(200);
    }

    public function testPrincipioActivoList()
    {
        $principioActivo = PrincipioActivo::factory()->make();
        $principioActivo->save();
        $response = $this->get('/principioactivo/list');
        $response->assertStatus(200)
        ->assertJson(['principioActivos' => [ 0 =>
            ['nombre' => $principioActivo->nombre]
        ]]); 
    }

    public function testPrincipioActivoShow()
    {
        $principioActivo = PrincipioActivo::factory()->make();
        $response = $this->post('/principioactivo/show', ['id' => $principioActivo->id]);
        $response->assertStatus(200); 
    }

    public function testPrincipioActivoNew()
    {
        $response = $this->get('/principioactivo/new');
        $response->assertStatus(200); 
    }

    public function testPrincipioActivoStore()
    {
        $response = $this->post('/principioactivo/store', [
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

    public function testPrincipioActivoEdit()
    {
        $principioActivo = PrincipioActivo::factory()->make();
        $principioActivo->save();
        $response = $this->post('/principioactivo/edit', ['id' => $principioActivo->id]);
        $response->assertStatus(200); 
    }

    public function testPrincipioActivoUpdate()
    {
        $principioActivo = PrincipioActivo::factory()->make();
        $principioActivo->save();
        $response = $this->post('/principioactivo/update', [
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
