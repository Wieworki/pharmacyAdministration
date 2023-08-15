<?php

namespace Tests\Feature;

use App\Models\Laboratorio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LaboratorioTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexLaboratorio()
    {
        $response = $this->get('/laboratorio');
        $response->assertStatus(200);
    }

    public function testLaboratorioList()
    {
        $laboratorio = Laboratorio::factory()->make();
        $laboratorio->save();
        $response = $this->get('/laboratorio/list');
        $response->assertStatus(200)
        ->assertJson(['laboratorios' => [ 0 =>
            ['nombre' => $laboratorio->nombre]
        ]]); 
    }

    public function testLaboratorioShow()
    {
        $laboratorio = Laboratorio::factory()->make();
        $response = $this->post('/laboratorio/show', ['id' => $laboratorio->id]);
        $response->assertStatus(200); 
    }

    public function testLaboratorioNew()
    {
        $response = $this->get('/laboratorio/new');
        $response->assertStatus(200); 
    }

    public function testLaboratorioStore()
    {
        $response = $this->post('/laboratorio/store', [
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

    public function testLaboratorioEdit()
    {
        $laboratorio = Laboratorio::factory()->make();
        $laboratorio->save();
        $response = $this->post('/laboratorio/edit', ['id' => $laboratorio->id]);
        $response->assertStatus(200); 
    }

    public function testLaboratorioUpdate()
    {
        $laboratorio = Laboratorio::factory()->make();
        $laboratorio->save();
        $response = $this->post('/laboratorio/update', [
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
