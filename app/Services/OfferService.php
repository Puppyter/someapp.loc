<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use App\Repositories\OfferRepository;
use Illuminate\Support\Facades\Storage;

class OfferService
{
    private $offerRepository;
    private $imageRepository;

    public function __construct(OfferRepository $offerRepository, ImageRepository $imageRepository)
    {
        $this->offerRepository = $offerRepository;
        $this->imageRepository = $imageRepository;
    }

    public function create(array $data)
    {
        return $this->offerRepository->create($data);
    }

    public function getAll()
    {
        $data = $this->offerRepository->getAll();
        foreach ($data as $offer)
        {
            $offer->model_id=$offer->model;
            $offer->manufacture_id = $offer->manufacture;
            if ($offer->images->first()!=null) {
                $offer->image = Storage::url($offer->images->first()['image']);
            }
        }
        return $data;
    }

    public function get(int $offerId)
    {
        $offer = $this->offerRepository->find($offerId);
        $offer->user = $offer->user->firstName;
        $offer->model = $offer->model->name;
        $offer->manufacture = $offer->manufacture->name;
        $offer->body_type = $offer->bodyType->name;
        $offer->motor = $offer->motor->name;
        foreach ($offer->images as $image) {
            $image['image'] = Storage::url($image['image']);
        }
        return $offer;
    }

    public function createImage(array $data)
    {
        $this->imageRepository->create($data);
    }

    public function update(int $offerId,array $data)
    {
        if ($data['images']!= null)
        {
            $this->createImage($data['images']);
        }
        return $this->offerRepository->update($offerId,$data);
    }

    public function destroy(int $offerId)
    {
        return $this->offerRepository->destroy($offerId);
    }

    public function destroyImage(int $imageId)
    {
        return $this->imageRepository->destroy($imageId);
    }
}
