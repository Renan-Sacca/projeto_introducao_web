<?php

namespace App\Services;

use App\Interface\ConsultasRepositoryInterface;

class ConsultasService
{
    public function __construct(
        protected ConsultasRepositoryInterface $consultasRepository
    ) {       
    }

    public function all() {
        return $this->consultasRepository->all();
    }

    public function create(array $data) {
        return $this->consultasRepository->create($data);
    }

    public function find(int $id) {
        return $this->consultasRepository->find($id);
    }

    public function update(array $data, int $id) {
        return $this->consultasRepository->update($data, $id);
    }

    public function delete(int $id) {
        return $this->consultasRepository->delete($id);
    }
}