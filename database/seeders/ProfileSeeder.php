<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        for ($i = 1; $i < 11; $i++) {
            DB::table('profiles')->insert([
                'user_id' => $i,
                'phone' => $this->faker->phoneNumber,
                'name' => $this->faker->name,
                'surname' => $this->faker->lastName,
                'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'address' => $this->faker->address,
                'birthday_at' => $this->faker->date(),
                'avatar' => 'image/Avatars/1/default-user.png',
                'created_at' => $this->faker->dateTime,
                'updated_at' => $this->faker->dateTime,
            ]);
        }
    }
}
