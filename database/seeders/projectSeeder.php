<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 
use Faker\Factory as Faker;
use Datetime;

class projectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $teamID =  DB::table('teams')->pluck('team_id')->toArray();
        // $doctor = DB::table('doctors')->pluck('doc_id')->toArray();
        foreach (range(1, 10) as $value) {
            DB::table('projects')->insert([
            'ProjectName' => $faker->company(),
            'start' => $faker->dateTime($max = 'now'),
            'End' => $faker->dateTime($max = 'now +3 weeks'),
            'ProjectDescription' => $faker->paragraph(30),
            'is_completed' => 0,
            'status' => 'New',
            'progress' => 0,
            'TeamID' => $faker->randomElement($teamID),
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now'),
        ]);
        }
    }
}
