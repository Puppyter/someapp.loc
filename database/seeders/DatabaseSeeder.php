<?php

namespace Database\Seeders;

use App\Models\BodyType;
use App\Models\Fuel;
use App\Models\Image;
use App\Models\Manufacture;
use App\Models\Modell;
use App\Models\Motor;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();
         Manufacture::factory(10)->create();
         Modell::factory(10)->create();
         BodyType::factory(10)->create();
         Fuel::factory(10)->create();
         Motor::factory(10)->create();
         Offer::factory(10)->create();
         Image::factory(20)->create();
    }
}
