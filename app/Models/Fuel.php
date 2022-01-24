<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'manufacture_id'
    ];

      public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
