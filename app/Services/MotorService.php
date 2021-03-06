<?php

namespace App\Services;

use App\Repositories\MotorRepository;

class MotorService
{
    private $motorRepository;

    public function __construct(MotorRepository $motorRepository)
    {
        $this->motorRepository = $motorRepository;
    }

    public function createCar(array $data)
    {
        return $this->motorRepository->create($data);
    }

    public function getAll()
    {
        return $this->motorRepository->getAll();
    }

}
