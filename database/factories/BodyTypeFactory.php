<?php

namespace Database\Factories;

use App\Models\Manufacture;
use Illuminate\Database\Eloquent\Factories\Factory;

class BodyTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word,
            'manufacture_id'=>Manufacture::orderByRaw("RAND()")->first()->id,
        ];
    }
}
