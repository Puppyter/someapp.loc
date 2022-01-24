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

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
