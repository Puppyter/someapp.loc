<?php

namespace Database\Factories;

use App\Models\BodyType;
use App\Models\Fuel;
use App\Models\Manufacture;
use App\Models\Modell;
use App\Models\Motor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $manufactureId=Manufacture::orderByRaw("RAND()")->first()->id;
        $models = Modell::where('manufacture_id',$manufactureId)->get('id')->toArray();
        if ($models == null)
        {
            $models = [1];
        }
        $motors = Motor::where('manufacture_id',$manufactureId)->get('id')->toArray();
        if ($motors == null)
        {
            $motors = [1];
        }
        $fuels = Fuel::where('manufacture_id',$manufactureId)->get('id')->toArray();
        if ($fuels == null)
        {
            $fuels = [1];
        }
        $bodyTypes = BodyType::where('manufacture_id',$manufactureId)->get('id')->toArray();
        if ($bodyTypes == null)
        {
            $bodyTypes = [1];
        }
        return [
            'user_id'=>User::orderByRaw("RAND()")->first()->id,
            'manufacture_id'=>$manufactureId,
            'model_id'=>array_rand($models,1)+1,
            'motor_id'=>array_rand($motors,1)+1,
            'count_owners'=>rand(0,15),
            'color'=>$this->faker->colorName,
            'mileage'=>rand(0,20000),
            'year'=>$this->faker->year,
            'description'=>'test',
            'accident'=>$this->faker->boolean,
            'insurance'=>$this->faker->boolean,
            'body_type_id'=>array_rand($bodyTypes,1)+1,
            'city'=>$this->faker->city,
            'region'=>$this->faker->streetName,
            'price'=>rand(1000, 100000),
            'fuel_id'=>array_rand($fuels,1)+1,
            'technical_condition'=>$this->faker->boolean,
            'repainted'=>$this->faker->boolean,
            'image'=>$this->faker->imageUrl,
        ];
    }
}
