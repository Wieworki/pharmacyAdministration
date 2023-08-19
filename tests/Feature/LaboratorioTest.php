<?php

namespace Tests\Feature;

use App\Models\Laboratorio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LaboratorioTest extends TestCase
{
    use RefreshDatabase;

    public function testLaboratorioList()
    {
        $laboratorio = Laboratorio::factory()->make();
        $laboratorio->save();
        $response = $this->get('api/laboratorio/list');
        $response->assertStatus(200)
        ->assertJson(['laboratorios' => [ 0 =>
            ['nombre' => $laboratorio->nombre]
        ]]); 
    }

    public function testLaboratorioGet()
    {
        $laboratorio = Laboratorio::factory()->make();
        $laboratorio->save();
        $response = $this->post('api/laboratorio/get', ['id' => $laboratorio->id]);
        $response->assertStatus(200)
        ->assertJson(['laboratorio' =>
            ['nombre' => $laboratorio->nombre]
        ]);  
    }

    public function testLaboratorioStore()
    {
        $response = $this->post('api/laboratorio/store', [
            'nombre' => 'test'
        ]);
        $response->assertStatus(200)
        ->assertJsonFragment([
            'resultados' => 'ok',
        ]);

        $laboratorio = DB::table('laboratorios')
        ->orderBy('id')
        ->get()->first();

        $this->assertNotNull($laboratorio);
    }

    public function testLaboratorioUpdate()
    {
        $laboratorio = Laboratorio::factory()->make();
        $laboratorio->save();
        $response = $this->post('api/laboratorio/update', [
            'id' => $laboratorio->id,
            'nombre' => 'test'
        ]);
        $response->assertStatus(200)
        ->assertJsonFragment([
            'resultados' => 'ok',
        ]);

        $laboratorio->refresh();
        $this->assertEquals($laboratorio->nombre, 'test');
    }
}
