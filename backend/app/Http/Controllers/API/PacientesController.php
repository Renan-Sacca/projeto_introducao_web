<?php

namespace App\Http\Controllers\API;

use App\Services\PacientesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PacientesController extends Controller
{

    public function __construct(
        protected PacientesService $PacientesService
    ){

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PacientesT = $this->PacientesService->all();
        
        return response()->json([
            'success' => true,
            'data' => $PacientesT,
            'message' => 'All PacientesT retrivied.'
        ], Response::HTTP_OK);
    }

   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:144',
            'data_nascimento' => 'required|date',
            "endereco"  => 'required|string|max:144',
            "telefone" => 'required|string|max:144',
            "email" => 'required|string|max:144'
        ]);

        $PacientesT = $this->PacientesService->create($data);

        return response()->json([
            'success' => true,
            'data' => $PacientesT,
            'message' => 'PacientesT created.'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $PacientesT = $this->PacientesService->find($id);
        return response()->json([
            'success' => true,
            'data' => $PacientesT,
            'message' => 'PacientesT found.'
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:144',
            'data_nascimento' => 'required|date',
            "endereco"  => 'required|string|max:144',
            "telefone" => 'required|string|max:144',
            "email" => 'required|string|max:144'
        ]);

        $PacientesT = $this->PacientesService->update($data, $id);

        return response()->json([
            'success' => true,
            'data' => $PacientesT,
            'message' => 'PacientesT updated.'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->PacientesService->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
