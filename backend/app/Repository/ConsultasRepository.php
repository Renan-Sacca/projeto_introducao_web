<?php

namespace App\Repository;
use App\Interface\ConsultasRepositoryInterface;
use App\Models\Consultas;

class ConsultasRepository implements ConsultasRepositoryInterface
{
   /**
     * Create a new class instance.
     */
    public function all()
    {
        return Consultas::all();
    }

    public function find(int $id){
        return Consultas::findOrFail($id);

    }

    public function create(array $data){
        return Consultas::create($data);
    }

    public function update(array $data, int $id){
        return Consultas::findOrFail($id)->update($data);


    }

    public function delete(int $id){
        Consultas::findOrFail($id)->delete();
    }
}
