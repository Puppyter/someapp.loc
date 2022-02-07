<?php

namespace App\Repositories;

use App\Models\Offer;

class OfferRepository
{
    public $conditions;
    public $prices;

    public function create(array $data)
    {
        return Offer::create($data);
    }

    public function search(?array $conditions, ?array $prices)
    {
        $query = Offer::query();

        if ($conditions != null) {
            $query->where($conditions);
        }

        if ($prices != null) {
            $query->whereBetween('price', $prices);
        }

        return $query->get();
    }

    public function setPrice(int $from, int $to)
    {
        return [$from, $to];
    }

    public function getAll()
    {
        return Offer::paginate(20);
    }

    public function update(int $id, array $data)
    {
        return $this->find($id)->update($data);
    }

    public function find(int $id)
    {
        return Offer::find($id);
    }

    public function destroy(int $id)
    {
        return Offer::destroy($id);
    }

    public function updateToTop(int $userId)
    {
        Offer::where('user_id',$userId)->update(['is_top'=>true]);
    }
}
