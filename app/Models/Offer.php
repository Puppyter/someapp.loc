<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manufacture',
        'model',
        'motor',
        'count_owners',
        'color',
        'mileage',
        'year',
        'description',
        'accident',
        'insurance',
        'body_type',
        'city',
        'region',
        'technical_condition',
        'repainted'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
