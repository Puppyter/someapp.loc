<?php

namespace App\Services;

use App\Repositories\FuelRepository;

class FuelService
{
    private $fuelRepository;

    public function __construct(FuelRepository $fuelRepository)
    {
        $this->fuelRepository = $fuelRepository;
    }

    public function createCar(array $data)
    {
        return $this->fuelRepository->create($data);
    }

    public function get($id)
    {
        return $this->fuelRepository->get($id);
    }

    public function getAll()
    {
        return $this->fuelRepository->getAll();
    }
}
