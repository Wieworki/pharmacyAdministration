<?php

namespace App\Http\Controllers;

use App\Models\Afiliado;
use Illuminate\Http\Request;

class AfiliadoController extends Controller
{
    public function list () {
        $afiliados = Afiliado::all();
        return response()->json(['afiliados' => $afiliados]);
    }

    public function get (Request $request) {
        $afiliado = Afiliado::loadById($request->id);
        return response()->json(['afiliado' => $afiliado]);
    }
}
