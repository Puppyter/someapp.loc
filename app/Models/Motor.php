<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    protected $fillable = [
        'fuel_id',
        'body_type_id',
        'name'
    ];

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }

    public function bodyType()
    {
        return $this->belongsTo(BodyType::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
