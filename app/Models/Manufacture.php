<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    public function models()
    {
        return $this->hasMany(Modell::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function motors()
    {
        return $this->hasMany(Motor::class);
    }

    public function bodyTypes()
    {
        return $this->hasMany(BodyType::class);
    }

    public function fuels()
    {
        return $this->hasMany(Fuel::class);
    }
}
