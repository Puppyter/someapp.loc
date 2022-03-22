<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use App\Repositories\OfferRepository;
use Illuminate\Support\Facades\Storage;
use Puppyter\Tracker\repositories\Watch;
use Puppyter\Tracker\repositories\WatchIp;

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
                $offer->image = Storage::disk('s3')->url($offer->images->first()['image']);
            }
        }
        return $data;
    }

    public function getTopViewedIp()
    {
        /** @var  $watchIp WatchIp */
        $tops = WatchIp::get();
        foreach ($tops as $top)
        {
            $top['offer'] = $this->get($top->offer_id);
        }
        return $tops;
    }

    public function getTopViewed()
    {
        /** @var $watch Watch */
        $tops = Watch::get();
        foreach ($tops as $top)
        {
            $top['offer'] = $this->get($top->offer_id);
        }
        return $tops;
    }

    public function get(int $offerId)
    {
        $watchIp = app(WatchIp::class);
        $watch = app(Watch::class);
        $offer = $this->offerRepository->find($offerId);
        $offer->model_id = $offer->model;
        $offer->manufacture_id = $offer->manufacture;
        $offer->body_type_id = $offer->bodyType;
        $offer->motor_id = $offer->motor;
        $offer->views  = $watch->getForId($offerId);
        $offer->viewsIp  = $watchIp->getForId($offerId);
        foreach ($offer->images as $image) {
            $image['image'] = Storage::disk('s3')->url($image['image']);
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
        $images = $this->imageRepository->getAllOffersImages($offerId);
        foreach ($images as $image)
        {
            $this->imageRepository->destroy($image->id);
        }
        return $this->offerRepository->destroy($offerId);
    }

    public function destroyImage(int $imageId)
    {
        return $this->imageRepository->destroy($imageId);
    }
}
