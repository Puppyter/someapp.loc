<?php

namespace App\Services;

use App\Repositories\BodyTypeRepository;

class BodyTypeService
{
    private $bodyTypeRepository;

    public function __construct(BodyTypeRepository $bodyTypeRepository)
    {
        $this->bodyTypeRepository = $bodyTypeRepository;
    }

    public function createCar(array $data)
    {
        return $this->bodyTypeRepository->create($data);
    }


    public function getAll()
    {
        return $this->bodyTypeRepository->getAll();
    }

}
