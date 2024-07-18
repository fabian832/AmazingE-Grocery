<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->references('role_id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('gender_id')->references('gender_id')->on('genders')->onUpdate('cascade')->onDelete('cascade');
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('email', 100);
            $table->string('display_picture_link', 100);
            $table->string('password');
            $table->rememberToken('remember_token')->nullable();
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
        Schema::dropIfExists('users');
    }
};
