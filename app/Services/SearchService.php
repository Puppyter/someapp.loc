<?php

namespace App\Services;

use App\Repositories\BodyTypeRepository;
use App\Repositories\FuelRepository;
use App\Repositories\ManufactureRepository;
use App\Repositories\ModelRepository;

class SearchService
{
    private $repositories= [
        'model' => ModelRepository::class,
        'manufacture' => ManufactureRepository::class,
        'fuel' => FuelRepository::class,
        'bodyType' => BodyTypeRepository::class,
    ];

    public function searchModels(int $id, string $by)
    {
        $repository = app($this->repositories[$by]);
        return $repository->searchModels($id);
    }

    public function searchMotors(int $id, string $by)
    {
        $repository = app($this->repositories[$by]);
        return $repository->searchMotors($id);
    }

    public function searchOffers(int $id, string $by)
    {
        $repository = app($this->repositories[$by]);
        return $repository->searchOffers($id);
    }

    public function searchBodyTypes(int $id, string $by)
    {
        $repository = app($this->repositories[$by]);
        return $repository->searchBodyType($id);
    }
}
