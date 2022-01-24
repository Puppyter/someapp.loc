<?php

namespace App\Services;

use App\Repositories\CarRepository;
use App\Repositories\ImageRepository;

class CarService
{
    private $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function createCar(array $data)
    {
        return $this->carRepository->create($data);
    }

    public function update(int $carId,array $data)
    {
        return $this->carRepository->update($carId,$data);
    }

    public function destroy(int $offerId)
    {
        return $this->carRepository->destroy($offerId);
    }

}
