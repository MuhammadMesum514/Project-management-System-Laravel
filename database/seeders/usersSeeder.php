<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 
use Faker\Factory as Faker;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach (range(1, 10) as $value) {
            DB::table('users')->insert([
            'name' => $faker->name(),
            'department' => $faker->company(),
            'designation' => $faker->company(),
            'email' => $faker->unique() ->safeEmail(),
            'password' => Hash::make('sam9912'),
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now'),
        ]);

        DB::table('managers')->insert([
            'name' => $faker->name(),
            'department' => $faker->company(),
            'designation' => $faker->company(),
            'email' => $faker->unique() ->safeEmail(),
            'password' => Hash::make('sam9912'),
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now'),
        ]);

        DB::table('admins')->insert([
            'name' => $faker->name(),
            'phone' => $faker->numerify(),
            'email' => $faker->unique() ->safeEmail(),
            'password' => Hash::make('sam9912'),
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now'),
        ]);

        }
    }
}
