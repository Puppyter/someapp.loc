<?php

namespace App\Services;

use App\Repositories\ManufactureRepository;

class ManufactureService
{
    private $manufactureRepository;

    public function __construct(ManufactureRepository $manufactureRepository)
    {
        $this->manufactureRepository = $manufactureRepository;
    }

    public function create(array $data)
    {
        return $this->manufactureRepository->create($data);
    }

    public function get($id)
    {
        return $this->manufactureRepository->get($id);
    }

    public function getAll()
    {
        return $this->manufactureRepository->getAll();
    }

}
