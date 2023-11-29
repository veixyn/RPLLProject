<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 50; $i++) {
            $name = $faker->firstName();
            $email = $faker->unique()->safeEmail();
            $password = bcrypt('12345678');
            $address = $faker->address();
            $rw = $faker->numberBetween(1, 3);
            $rt = $faker->numberBetween(1, 3);
            $is_admin = 0;
            $created_at = $faker->dateTimeBetween('-3 months', 'now');

            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'rw' => $rw,
                'rt' => $rt,
                'is_admin' => $is_admin,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        };
    }
}
