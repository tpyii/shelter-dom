<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained();
            $table->string('phone')->nullable()->unique()->index();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->text('description')->nullable();
            $table->mediumText('address')->nullable();
            $table->date('birthday_at')->nullable();
            $table->string('avatar')->default('image/Avatar/1/default-user.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
