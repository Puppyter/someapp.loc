<?php

namespace App\Repositories;

use App\Models\BodyType;

class BodyTypeRepository
{
    public function create(array $data)
    {
        return BodyType::create($data);
    }

    public function get(int $id)
    {
        return BodyType::find($id);
    }

    public function getAll()
    {
        return BodyType::get();
    }

}
