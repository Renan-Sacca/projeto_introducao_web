<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    // Listar todas as consultas
    public function index()
    {
        $consultas = Consulta::all();
        return response()->json($consultas);
    }

    // Mostrar uma consulta específica
    public function show($id)
    {
        $consulta = Consulta::find($id);
        if (is_null($consulta)) {
            return response()->json(['message' => 'Consulta não encontrada'], 404);
        }
        return response()->json($consulta);
    }

    // Criar uma nova consulta
    public function store(Request $request)
    {
        $consulta = Consulta::create($request->all());
        return response()->json($consulta, 201);
    }

    // Atualizar uma consulta existente
    public function update(Request $request, $id)
    {
        $consulta = Consulta::find($id);
        if (is_null($consulta)) {
            return response()->json(['message' => 'Consulta não encontrada'], 404);
        }
        $consulta->update($request->all());
        return response()->json($consulta);
    }

    // Deletar uma consulta
    public function destroy($id)
    {
        $consulta = Consulta::find($id);
        if (is_null($consulta)) {
            return response()->json(['message' => 'Consulta não encontrada'], 404);
        }
        $consulta->delete();
        return response()->json(null, 204);
    }
}
