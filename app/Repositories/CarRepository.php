<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository
{

    public function create(?array $data)
    {
        return Car::create($data);
    }

    public function find(int $carId)
    {
        return Car::find($carId);
    }

    public function search(string $param, $value)
    {
        return Car::where($param, $value)->get();
    }

    public function searchManufacture($searchValue)
    {
        return Car::whereIn('manufacture', $searchValue)->get();
    }

    public function searchModel($manufacture,$model)
    {
        return $this->searchManufacture($manufacture)->whereIn('model',$model)->get();
    }

    public function update(int $carId, array $data)
    {
        return $this->find($carId)->update($data);
    }

    public function destroy(int $id)
    {
        return Car::destroy($id);
    }
}
