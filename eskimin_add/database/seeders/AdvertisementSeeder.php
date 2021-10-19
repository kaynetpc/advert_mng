<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 5; $i++){
            Advertisement::create([
                'addId' => $faker->sentence($nbWords = 5, $variableWords = false),
                'name' => $faker->sentence($nbWords = 5, $variableWords = false),
                'dateFrom' => $faker->dateTimeThisYear(),
                'dateTo' => $faker->dateTimeThisYear(),
                'totalBudget' => "20000",
                'dailyBudget' => "2000",
                'description' => $faker->sentence($nbWords = 15, $variableWords = false),
                'bannerImage' => "image"
            ]);
        }
    }
}
