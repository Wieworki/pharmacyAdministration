<?php

namespace App\Http\Controllers;

use App\Models\PrincipioActivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrincipioActivoController extends Controller
{
    public function index () {
        return view('principioactivo.index');
    }

    public function list () {
        $principioActivos = PrincipioActivo::all();
        return response()->json(['principioActivos' => $principioActivos]);
    }

    public function show (Request $request) {
        $principioactivo = PrincipioActivo::loadById($request->id);
        return view('principioactivo.show', compact('principioactivo'));
    }

    public function new () {
        return view('principioactivo.new');
    }

    public function store (Request $request) {
        try {
            DB::beginTransaction();
            $principioactivo = new PrincipioActivo();
            $principioactivo->nombre = $request->nombre;
            $principioactivo->save();
            DB::commit();
            return  response()->json(['resultados' => "ok", 'mensaje' => "Cambios guardados."]);
        } catch (\Throwable $th) {
            DB::rollback();
            $error = $th->getMessage();
            return  response()->json(['resultados' => "error", 'error' => $error]);
        }
    }

    public function edit (Request $request) {
        $principioactivo = PrincipioActivo::loadById($request->id);
        return view('principioactivo.edit', compact('principioactivo'));
    }

    public function update (Request $request) {
        try {
            DB::beginTransaction();
            $principioactivo = PrincipioActivo::loadById($request->id);
            $principioactivo->nombre = $request->nombre;
            $principioactivo->save();
            DB::commit();
            return  response()->json(['resultados' => "ok", 'mensaje' => "Cambios guardados."]);
        } catch (\Throwable $th) {
            DB::rollback();
            $error = $th->getMessage();
            return  response()->json(['resultados' => "error", 'error' => $error]);
        }
    }
}
