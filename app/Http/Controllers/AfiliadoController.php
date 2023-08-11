<?php

namespace App\Http\Controllers;

use App\Models\Afiliado;
use Illuminate\Http\Request;

class AfiliadoController extends Controller
{
    public function index () {
        return view('afiliado.index');
    }

    public function list () {
        $afiliados = Afiliado::all();
        return response()->json(['afiliados' => $afiliados]);
    }

    public function show (Request $request) {
        $afiliado = Afiliado::loadById($request->id);
        return view('afiliado.show', compact('afiliado'));
    }
}
