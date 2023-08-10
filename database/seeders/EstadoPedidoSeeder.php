<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EstadoPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_pedidos')->insert([
            ['nombre' => "PENDIENTE"],
            ['nombre' => "APROBADO"],
            ['nombre' => "RECHAZADO"],
            ['nombre' => "ENTREGADO"],
            ['nombre' => "ANULADO"]
        ]);
    }
}
