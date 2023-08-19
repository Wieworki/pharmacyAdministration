<?php

namespace App\Http\Controllers;

use App\Models\PrincipioActivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrincipioActivoController extends Controller
{
    public function list () {
        $principioActivos = PrincipioActivo::all();
        return response()->json(['principioActivos' => $principioActivos]);
    }

    public function get (Request $request) {
        $principioactivo = PrincipioActivo::loadById($request->id);
        return response()->json(['principioActivo' => $principioactivo]);
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
