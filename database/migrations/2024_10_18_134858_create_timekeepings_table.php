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
        Schema::create('timekeepings', function (Blueprint $table) {
            $table->id('timekeeping_id');
            $table->time('checkin');
            $table->time('checkout');
            $table->date('date');
            $table->time('late');
            $table->time('leaving_soon');
            $table->tinyInteger('status');
            $table->string('shift_id');
            $table->string('profile_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timekeepings');
    }
};
