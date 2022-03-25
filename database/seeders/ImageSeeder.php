<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        DB::table('images')->insert([
            'path' =>$this->faker->file($sourceDir = 'public/images/tmp_for_db', $targetDir = 'public/images/tmp_db'),
            'created_at'=>$this->faker->dateTime,
            'updated_at'=>$this->faker->dateTime
        ]);
    }
}
