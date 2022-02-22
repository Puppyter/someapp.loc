<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Offer extends Model
{
    use HasFactory; use Searchable;

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
        'repainted',
        'is_prime',
        'image'
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

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }

    public function toSearchableArray()
    {
        $offers = $this->toArray();
        $offers = $this->transform($offers);
        $offers['model_id'] = $this->model->name;
        $offers['manufacture_id'] = $this->manufacture->name;
        $offers['body_type_id'] = $this->bodyType->name;
        $offers['motor_id'] = $this->motor->name;
        $offers['fuel_id'] = $this->fuel->name;
        $offers['image'] = Storage::disk('s3')->url($offers['image']);

        return $offers;
    }
}
