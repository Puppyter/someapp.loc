<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageRepository
{
    public function create(array $data)
    {
        return Image::create($data);
    }

    public function getAllOffersImages($offer_id)
    {
        return Image::where('offer_id', $offer_id)->get();
    }

    public function destroy($imageId)
    {
        $image = Image::find($imageId);
        Storage::delete($image->image);
        return Image::destroy($imageId);
    }
}
