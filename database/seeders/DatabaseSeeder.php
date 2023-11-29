<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DB;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Cast\Double;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'address' => 'Jl. Majalaya 10',
            'rt' => '1',
            'rw' => '1',
            'is_admin' => '1',
        ]);

        $this->call([
            UserSeeder::class,
            VolumeSeeder::class,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Vito',
        //     'email' => 'tanganavito123@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'address' => 'Jl. Majalaya 10',
        //     'rt' => '1',
        //     'rw' => '1',
        //     'is_admin' => '0',
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Vito 2',
        //     'email' => 'tanganavito321@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'address' => 'Jl. Majalaya 10',
        //     'rt' => '1',
        //     'rw' => '2',
        //     'is_admin' => '0',
        // ]);

        // DB::table('volumes')->insert([
        //     'user_id' => '3',
        //     'volume' => 2,
        //     'type' => 'kering',
        //     'type_description' => 'botol',
        // ]);

        // DB::table('volumes')->insert([
        //     'user_id' => '3',
        //     'volume' => 2.5,
        //     'type' => 'basah',
        //     'type_description' => null,
        // ]);

        // DB::table('volumes')->insert([
        //     'user_id' => '2',
        //     'volume' => 2,
        //     'type' => 'kering',
        //     'type_description' => 'dus',
        // ]);

        // DB::table('volumes')->insert([
        //     'user_id' => '2',
        //     'volume' => '7.7',
        //     'type' => 'kering',
        //     'type_description' => 'plastik',
        // ]);

        // DB::table('volumes')->insert([
        //     'user_id' => '2',
        //     'volume' => 5.5,
        //     'type' => 'basah',
        //     'type_description' => null,
        // ]);
    }
}
