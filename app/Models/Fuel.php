<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;

    protected $fillable =[
        'name'
    ];

    public function motors()
    {
        return $this->hasMany(Motor::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
