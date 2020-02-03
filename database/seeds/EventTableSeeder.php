<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 10000) as $i) {
            $data = [
                "name" => $faker->company,
                "team1name" => $faker->company,
                "team2name" => $faker->company,
                "team1wincoef" => $faker->randomFloat(2, 0.1, 3.5),
                "team2wincoef" => $faker->randomFloat(2, 0.1, 3.5),
                "draw_coef" => $faker->randomFloat(2, 0.1, 3.5),
                "start_date" => $faker->dateTime(\Carbon\Carbon::now()->addMonth()),
            ];

            DB::table('events')->insert($data);
        }
    }
}
