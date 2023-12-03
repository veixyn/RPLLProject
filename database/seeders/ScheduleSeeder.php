<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            'schedule' => '1'
        ]);
        DB::table('schedules')->insert([
            'schedule' => '2'
        ]);
        DB::table('schedules')->insert([
            'schedule' => '3'
        ]);
        DB::table('schedules')->insert([
            'schedule' => '4'
        ]);
        DB::table('schedules')->insert([
            'schedule' => '5'
        ]);
        DB::table('schedules')->insert([
            'schedule' => '6'
        ]);
        DB::table('schedules')->insert([
            'schedule' => '7'
        ]);
        DB::table('schedules')->insert([
            'schedule' => '8'
        ]);
        DB::table('schedules')->insert([
            'schedule' => '9'
        ]);
    }
}
