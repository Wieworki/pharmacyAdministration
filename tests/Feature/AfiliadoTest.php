<?php

namespace Tests\Feature;

use App\Models\Afiliado;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AfiliadoTest extends TestCase
{
    use RefreshDatabase;

    public function testAfiliadosList()
    {
        $afiliado = Afiliado::factory()->make();
        $afiliado->save();
        $response = $this->get('api/afiliado/list');
        $response->assertStatus(200)
        ->assertJson(['afiliados' => [ 0 =>
            ['nombre' => $afiliado->nombre, 'dni' => $afiliado->dni]
        ]]); 
    }

    public function testAfiliadoGet()
    {
        $afiliado = Afiliado::factory()->make();
        $afiliado->save();
        $response = $this->post('api/afiliado/get', ['id' => $afiliado->id]);
        $response->assertStatus(200)
        ->assertJson(['afiliado' =>
            ['nombre' => $afiliado->nombre, 'dni' => $afiliado->dni]
        ]); 
    }
}
