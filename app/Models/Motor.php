<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    protected $fillable = [
        'manufacture_id',
        'name'
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
