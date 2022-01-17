<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manufacture_id',
        'model_id',
        'motor_id',
        'count_owners',
        'color',
        'mileage',
        'year',
        'description',
        'accident',
        'insurance',
        'body_type_id',
        'city',
        'region',
        'price',
        'fuel_id',
        'technical_condition',
        'repainted'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function model()
    {
        return $this->belongsTo(Modell::class, 'model_id','id');
    }

    public function bodyType()
    {
        return $this->belongsTo(BodyType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }
}
