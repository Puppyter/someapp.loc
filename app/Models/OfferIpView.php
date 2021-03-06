<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferIpView extends Model
{
    use HasFactory;

    protected $fillable =[
        'offer_id',
    ];

    public function viewerIps()
    {
        return $this->hasMany(ViewerIp::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
