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
        Schema::create('relatives', function (Blueprint $table) {
            $table->id('relative_id');
            $table->text('relatives_name');
            $table->date('relatives_birthday');
            $table->string('relatives_phone');
            $table->string('relationship');
            $table->string('relative_job');
            $table->string('relative_nation');
            $table->string('relative_temp_address');
            $table->string('relative_current_address');
            $table->string('profile_id');
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
        Schema::dropIfExists('relatives');
    }
};
