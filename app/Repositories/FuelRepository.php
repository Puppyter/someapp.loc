<?php

namespace App\Repositories;

use App\Models\Fuel;

class FuelRepository
{
    public function create(array $data)
    {
        return Fuel::create($data);
    }

    public function get(int $id)
    {
        return Fuel::find($id);
    }

    public function getAll()
    {
        return Fuel::get();
    }

}
