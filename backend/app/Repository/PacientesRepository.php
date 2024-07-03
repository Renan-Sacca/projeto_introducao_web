<?php

namespace App\Repository;
use App\Interface\PacientesRepositoryInterface;
use App\Models\Pacientes;

class PacientesRepository implements PacientesRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function all()
    {
        return Pacientes::all();
    }

    public function find(int $id){
        return Pacientes::findOrFail($id);

    }

    public function create(array $data){
        return Pacientes::create($data);
    }

    public function update(array $data, int $id){
        return Pacientes::findOrFail($id)->update($data);


    }

    public function delete(int $id){
        Pacientes::findOrFail($id)->delete();
    }
}
