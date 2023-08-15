<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicamentoController extends Controller
{
    public function index () {
        return view('medicamento.index');
    }

    public function list () {
        $medicamentos = Medicamento::all();
        return response()->json(['medicamentos' => $medicamentos]);
    }

    public function show (Request $request) {
        $medicamento = Medicamento::loadById($request->id);
        return view('medicamento.show', compact('medicamento'));
    }

    public function new () {
        return view('medicamento.new');
    }

    public function store (Request $request) {
        try {
            DB::beginTransaction();
            $item = new Item;
            $item->nombre = $request->nombre;
            $item->es_medicamento = 1;
            $item->save();
            $medicamento = new Medicamento;
            $medicamento->item_id = $item->id;
            $medicamento->principio_activo_id = $request->principio_activo_id;
            $medicamento->laboratorio_id = $request->laboratorio_id;
            $medicamento->marca = $request->marca;
            $medicamento->presentacion = $request->presentacion;
            $medicamento->save();
            DB::commit();
            return  response()->json(['resultados' => "ok", 'mensaje' => "Cambios guardados."]);
        } catch (\Throwable $th) {
            DB::rollback();
            $error = $th->getMessage();
            return  response()->json(['resultados' => "error", 'error' => $error]);
        }
    }

    public function edit (Request $request) {
        $medicamento = Medicamento::loadById($request->id);
        return view('medicamento.edit', compact('medicamento'));
    }

    public function update (Request $request) {
        try {
            DB::beginTransaction();
            $medicamento = Medicamento::loadById($request->id_medicamento);
            $medicamento->principio_activo_id = $request->principio_activo_id;
            $medicamento->laboratorio_id = $request->laboratorio_id;
            $medicamento->marca = $request->marca;
            $medicamento->presentacion = $request->presentacion;
            $medicamento->item->setNombre($request->nombre);
            $medicamento->save();
            DB::commit();
            return  response()->json(['resultados' => "ok", 'mensaje' => "Cambios guardados."]);
        } catch (\Throwable $th) {
            DB::rollback();
            $error = $th->getMessage();
            return  response()->json(['resultados' => "error", 'error' => $error]);
        }
    }
}
