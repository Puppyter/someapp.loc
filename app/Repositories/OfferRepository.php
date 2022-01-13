<?php

namespace App\Repositories;

use App\Models\Offer;

class OfferRepository
{
    public function create(array $data)
    {
        return Offer::create($data);
    }

    public function find(int $id)
    {
        return Offer::find($id);
    }

    public function search(string $param, $value)
    {
        return Offer::where($param, $value)->get();
    }


    public function getAll()
    {
        return Offer::paginate(20);
    }

    public function update(int $id, array $data)
    {
        return $this->find($id)->update($data);
    }

    public function destroy(int $id)
    {
        return Offer::destroy($id);
    }

}
