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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id('profile_id');
            $table->string('profile_name');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('temporary_address');
            $table->string('current_address');
            $table->string('identify_num');
            $table->string('place_of_birth');
            $table->string('nation');
            $table->date('birthday');
            $table->date('id_license_day');
            $table->boolean('gender');
            $table->boolean('marriage');
            $table->tinyInteger('role_id');
            $table->tinyInteger('profile_status');
            $table->string('department_id');
            $table->string('position_id');
            $table->string('salary_id');
            $table->string('labor_contract_id');
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
};