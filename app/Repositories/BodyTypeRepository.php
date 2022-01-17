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
        return BodyType::all();
    }

    public function searchMotors(int $id)
    {
        return $this->get($id)->motors;
    }

    public function searchModels(int $id)
    {
        return $this->get($id)->models;
    }
}
