<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaboratorioController extends Controller
{
    public function index () {
        return view('laboratorio.index');
    }

    public function list () {
        $laboratorios = Laboratorio::all();
        return response()->json(['laboratorios' => $laboratorios]);
    }

    public function show (Request $request) {
        $laboratorio = Laboratorio::loadById($request->id);
        return view('laboratorio.show', compact('laboratorio'));
    }

    public function new () {
        return view('laboratorio.new');
    }

    public function store (Request $request) {
        try {
            DB::beginTransaction();
            $laboratorio = new Laboratorio();
            $laboratorio->nombre = $request->nombre;
            $laboratorio->save();
            DB::commit();
            return  response()->json(['resultados' => "ok", 'mensaje' => "Cambios guardados."]);
        } catch (\Throwable $th) {
            DB::rollback();
            $error = $th->getMessage();
            return  response()->json(['resultados' => "error", 'error' => $error]);
        }
    }

    public function edit (Request $request) {
        $laboratorio = Laboratorio::loadById($request->id);
        return view('laboratorio.edit', compact('laboratorio'));
    }

    public function update (Request $request) {
        try {
            DB::beginTransaction();
            $laboratorio = Laboratorio::loadById($request->id);
            $laboratorio->nombre = $request->nombre;
            $laboratorio->save();
            DB::commit();
            return  response()->json(['resultados' => "ok", 'mensaje' => "Cambios guardados."]);
        } catch (\Throwable $th) {
            DB::rollback();
            $error = $th->getMessage();
            return  response()->json(['resultados' => "error", 'error' => $error]);
        }
    }
}
