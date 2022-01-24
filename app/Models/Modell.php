<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modell extends Model
{
    use HasFactory;

    protected $table='models';

    protected $fillable = [
        'manufacture_id',
        'name'
    ];

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'model_id', 'id');
    }
}
