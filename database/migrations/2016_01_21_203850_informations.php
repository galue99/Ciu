<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Informations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('dni')->unique();
            $table->string('genere');
            $table->string('address');
            $table->integer('country');
            $table->integer('state');
            $table->string('city');
            $table->string('phone');
            $table->string('cellphone');
            $table->integer('country_s');
            $table->integer('state_s');
            $table->string('city_s');
            $table->integer('training_area');
            $table->string('specialty');
            $table->integer('academic_degree_obtained');
            $table->integer('senior_year');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('informations');
    }
}
