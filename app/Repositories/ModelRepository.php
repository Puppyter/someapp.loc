<?php

namespace App\Repositories;

use App\Models\Modell;

class ModelRepository
{
    public function create(array $data)
    {
        return Modell::create($data);
    }

    public function get(int $id)
    {
        return Modell::find($id);
    }

    public function getAll()
    {
        return Modell::get();
    }

    public function searchOffers(int $id)
    {
        return Modell::find($id)->offers;
    }

   public function getManufacture(int $id)
   {
       return [Modell::find($id)->manufacture];
   }

}
