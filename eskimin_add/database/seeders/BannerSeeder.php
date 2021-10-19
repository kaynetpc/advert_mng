<?php

namespace Database\Seeders;


use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
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
            Banner::create([
                'addId' => $faker->sentence($nbWords = 5, $variableWords = false),
                'imgId' => $faker->sentence($nbWords = 5, $variableWords = false),
                'name' => $faker->sentence($nbWords = 5, $variableWords = false)
            ]);
        }
    }
}
