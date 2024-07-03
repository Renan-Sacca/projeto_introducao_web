<?php

namespace App\Services;

use App\Interface\PacientesRepositoryInterface;

class PacientesService
{
    public function __construct(
        protected PacientesRepositoryInterface $pacientesRepository
    ) {       
    }

    public function all() {
        return $this->pacientesRepository->all();
    }

    public function create(array $data) {
        return $this->pacientesRepository->create($data);
    }

    public function find(int $id) {
        return $this->pacientesRepository->find($id);
    }

    public function update(array $data, int $id) {
        return $this->pacientesRepository->update($data, $id);
    }

    public function delete(int $id) {
        return $this->pacientesRepository->delete($id);
    }
}