<?php

namespace App\Http\Controllers\API;

use App\Services\ConsultasService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConsultasController extends Controller
{
    public function __construct(
        protected ConsultasService $ConsultasService
    ){

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Consultas = $this->ConsultasService->all();
        
        return response()->json([
            'success' => true,
            'data' => $Consultas,
            'message' => 'All Consultas retrivied.'
        ], Response::HTTP_OK);
    }

   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'paciente_id' => 'required|int|exists:pacientes,id',
            'tipo_consulta' => 'required|string|max:144',
            "data_hora"  => 'required|date:Y-m-d\TH:i:sP',
        ]);

        $Consultas = $this->ConsultasService->create($data);

        return response()->json([
            'success' => true,
            'data' => $Consultas,
            'message' => 'Consultas created.'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $Consultas = $this->ConsultasService->find($id);
        return response()->json([
            'success' => true,
            'data' => $Consultas,
            'message' => 'Consultas found.'
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'paciente_id' => 'required|int|exists:pacientes,id',
            'tipo_consulta' => 'required|string|max:144',
            "data_hora"  => 'required|date:Y-m-d\TH:i:sP',
        ]);

        $Consultas = $this->ConsultasService->update($data, $id);

        return response()->json([
            'success' => true,
            'data' => $Consultas,
            'message' => 'Consultas updated.'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->ConsultasService->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
