<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'admin',
            'email'=>'admin@admin.com',
            'password'=>'$2y$10$X6btxRya8OHVsz/X/HZSLuq2gbDAB3MWCO3bPJwP7yu5SMKy8ohl2',
            'is_admin' => true,
            'created_at'=>now()
        ]);
    }
}
