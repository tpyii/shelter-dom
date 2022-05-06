<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('animal_user')->insert([
                    ['user_id' => $i, 'animal_id' => rand(1,10),],
                    ['user_id' => $i, 'animal_id' => rand(1,10),],
                    ['user_id' => $i, 'animal_id' => rand(1,10),],
                ]
            );
        }
    }
}
