<?php

namespace Database\Factories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'offer_id'=>Offer::orderByRaw("RAND()")->first()->id,
            'image'=>$this->faker->imageUrl,
        ];
    }
}
