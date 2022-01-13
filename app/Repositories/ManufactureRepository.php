<?php

namespace App\Repositories;

use App\Models\Manufacture;

class ManufactureRepository
{
    public function create(array $data)
    {
        return Manufacture::create($data);
    }

    public function get(int $id)
    {
        return Manufacture::find($id);
    }

    public function getAll()
    {
        return Manufacture::get();
    }

}
