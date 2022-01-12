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

    public function get($id)
    {
        return $this->carRepository->find($id);
    }

    public function getAll()
    {
        $cars = $this->carRepository->getAll();
        foreach ($cars as $car)
        {
            $car->image = $car->images;
        }
        return $cars;
    }

    public function search(string $param, $searchVal)
    {
        return $this->carRepository->search($param, $searchVal);
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
