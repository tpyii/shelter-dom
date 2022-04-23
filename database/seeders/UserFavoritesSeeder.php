<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserFavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users_favorites_animals')->insert([
                    ['user_id' => $i, 'animal_id' => rand(1,10),],
                    ['user_id' => $i, 'animal_id' => rand(1,10),],
                    ['user_id' => $i, 'animal_id' => rand(1,10),],
                ]
            );
        }
    }
}
