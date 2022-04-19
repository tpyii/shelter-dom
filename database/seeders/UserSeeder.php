<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        DB::table('users')->insert([
            'name' => $this->faker->company,
            'email' => $this->faker->email,
            'password' => '$2y$10$CT5GIrlaI1iMgBnx7T9R3.YJX7Pu8QQpnoyEiH936sEv3k.YP8EzO',
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ]);
    }
}
