<?php

namespace App\Repositories;

use App\Models\Motor;

class MotorRepository
{
    public function create(array $data)
    {
        return Motor::create($data);
    }

    public function get(int $id)
    {
        return Motor::find($id);
    }

    public function getAll()
    {
        return Motor::get();
    }
}
