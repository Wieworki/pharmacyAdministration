<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use App\Models\PrincipioActivo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MedicamentoTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexMedicamento()
    {
        $response = $this->get('/medicamento');
        $response->assertStatus(200);
    }

    public function testMedicamentoShow()
    {
        $laboratorio = Laboratorio::factory()->make();
        $principioActivo = PrincipioActivo::factory()->make();
        $item = Item::factory()->make();
        $medicamento = Medicamento::factory()->make([
            'laboratorio_id' => $laboratorio->id,
            'principio_activo_id' => $principioActivo->id,
            'item_id' => $item->id
        ]);
        $response = $this->post('/medicamento/show', ['id' => $medicamento->id]);
        $response->assertStatus(200); 
    }

    public function testNewMedicamento()
    {
        $response = $this->get('/medicamento/new');
        $response->assertStatus(200);
    }

    public function testMedicamentoStore()
    {
        $laboratorio = Laboratorio::factory()->make();
        $laboratorio->save();
        $principioActivo = PrincipioActivo::factory()->make();
        $principioActivo->save();

        $response = $this->post('/medicamento/store', [
            'principio_activo_id' => $principioActivo->id,
            'laboratorio_id' => $laboratorio->id,
            'marca' => 'marca',
            'presentacion' => 'presentacion',
            'nombre' => 'medicamento'
        ]);

        $response->assertStatus(200)
        ->assertJsonFragment([
            'resultados' => 'ok',
        ]);

        $medicamento = DB::table('medicamentos')
        ->orderBy('id')
        ->get()->first();

        $this->assertNotNull($medicamento);
    }

    public function testMedicamentoEdit()
    {
        $laboratorio = Laboratorio::factory()->make();
        $principioActivo = PrincipioActivo::factory()->make();
        $item = Item::factory()->make();
        $medicamento = Medicamento::factory()->make($laboratorio->id, $principioActivo->id, $item->id);
        $response = $this->post('/medicamento/edit', ['id' => $medicamento->id]);
        $response->assertStatus(200);
    }

    public function testMedicamentoUpdate()
    {
        $laboratorioOriginal = Laboratorio::factory()->make();
        $laboratorioOriginal->save();
        $principioActivoOriginal = PrincipioActivo::factory()->make();
        $principioActivoOriginal->save();
        $item = Item::factory()->make();
        $item->save();
        $medicamento = Medicamento::factory()->make([
            'laboratorio_id' => $laboratorioOriginal->id,
            'principio_activo_id' => $principioActivoOriginal->id,
            'item_id' => $item->id
        ]);
        $medicamento->save();

        $laboratorioNuevo = Laboratorio::factory()->make();
        $laboratorioNuevo->save();
        $principioActivoNuevo = PrincipioActivo::factory()->make();
        $principioActivoNuevo->save();

        $response = $this->post('/medicamento/update', [
            'id_medicamento' => $medicamento->id,
            'principio_activo_id' => $principioActivoNuevo->id,
            'laboratorio_id' => $laboratorioNuevo->id,
            'marca' => 'marca',
            'presentacion' => 'presentacion',
            'nombre' => 'nombre'
        ]);
        
        $response->assertStatus(200)
        ->assertJsonFragment([
            'resultados' => 'ok',
        ]);
        
        $medicamento->refresh();
        //$this->assertEquals($medicamento->getLaboratorio(), $laboratorioNuevo->nombre);
        $this->assertEquals($medicamento->getPrincipioActivo(), $principioActivoNuevo->nombre);
    }

    public function testMedicamentoList()
    {
        $laboratorioOriginal = Laboratorio::factory()->make();
        $principioActivoOriginal = PrincipioActivo::factory()->make();
        $item = Item::factory()->make();
        $medicamento = Medicamento::factory()->make($laboratorioOriginal->id, $principioActivoOriginal->id, $item->id);
        $medicamento->save();

        $response = $this->get('/medicamento/list');
        $response->assertStatus(200)
        ->assertJson(['medicamentos' => [ 0 =>
            ['marca' => $medicamento->marca, 'presentacion' => $medicamento->presentacion]
        ]]); 
    }
}
