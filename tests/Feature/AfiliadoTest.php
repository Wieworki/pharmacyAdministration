<?php

namespace Tests\Feature;

use App\Models\Afiliado;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AfiliadoTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexAfiliados()
    {
        $response = $this->get('/afiliado');
        $response->assertStatus(200);
    }

    public function testAfiliadosList()
    {
        $afiliado = Afiliado::factory()->make();
        $afiliado->save();
        $response = $this->get('/afiliado/list');
        $response->assertStatus(200)
        ->assertJson(['afiliados' => [ 0 =>
            ['nombre' => $afiliado->nombre, 'dni' => $afiliado->dni]
        ]]); 
    }

    public function testAfiliadoShow()
    {
        $afiliado = Afiliado::factory()->make();
        $response = $this->post('/afiliado/show', ['id' => $afiliado->id]);
        $response->assertStatus(200); 
    }
}
