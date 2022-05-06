<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2022_04_23_060008_create_animal_user_table.php
class CreateAnimalUserTable extends Migration
=======
class CreateUsersFavouritesTable extends Migration
>>>>>>> test_react_branch:database/migrations/2022_04_28_070101_create_users_favourites_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2022_04_23_060008_create_animal_user_table.php
        Schema::create('animal_user', function (Blueprint $table) {
=======
        Schema::create('users_favourites', function (Blueprint $table) {
>>>>>>> test_react_branch:database/migrations/2022_04_28_070101_create_users_favourites_table.php
            $table->foreignId('user_id')->constrained();
            $table->foreignId('animal_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:database/migrations/2022_04_23_060008_create_animal_user_table.php
        Schema::dropIfExists('animal_user');
=======
        Schema::dropIfExists('users_favourites');
>>>>>>> test_react_branch:database/migrations/2022_04_28_070101_create_users_favourites_table.php
    }
}
