<?php

namespace App\Repositories;

use App\Models\Manufacture;

class ManufactureRepository
{
    public function create(array $data)
    {
        return Manufacture::create($data);
    }

    public function getAll()
    {
        return Manufacture::get();
    }

    public function searchModels(int $id)
    {
        return Manufacture::find($id)->models;
    }

    public function searchMotors(int $id)
    {
        return Manufacture::find($id)->motors;
    }

    public function searchOffers(int $id)
    {
        return Manufacture::find($id)->offers;
    }

    public function searchBodyTypes(int $id)
    {
        return Manufacture::find($id)->bodyTypes;
    }

    public function searchFuels(int $id)
    {
        return Manufacture::find($id)->fuels;
    }
}
