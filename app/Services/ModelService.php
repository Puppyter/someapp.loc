<?php

namespace App\Services;

use App\Repositories\ModelRepository;

class ModelService
{
    private $modelRepository;

    public function __construct(ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    public function createCar(array $data)
    {
        return $this->modelRepository->create($data);
    }

    public function get($id)
    {
        return $this->modelRepository->get($id);
    }

    public function getAll()
    {
        return $this->modelRepository->getAll();
    }

}
