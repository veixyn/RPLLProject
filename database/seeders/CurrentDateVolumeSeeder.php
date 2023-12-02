<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrentDateVolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 5; $i++) {
            $user_id = $faker->numberBetween(1, 50);
            $volume = $faker->randomFloat(2, 1, 100);
            $type = $faker->randomElement(['Kering', 'Basah']);
            if ($type == 'Kering') {
                $type_description = $faker->randomElement(['Dus', 'Kertas', 'Botol', 'Plastik', 'Kaleng']);
            } else {
                $type_description = null;
            };
            $created_at = $faker->dateTimeBetween('-3 hours', 'now');

            DB::table('volumes')->insert([
                'user_id' => $user_id,
                'volume' => $volume,
                'type' => $type,
                'type_description' => $type_description,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        };
    }
}
