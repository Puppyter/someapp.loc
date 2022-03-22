<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferView extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'views'
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
