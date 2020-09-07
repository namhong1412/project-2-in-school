<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetPitchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_pitch', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 255);
            $table->unsignedBigInteger('pitch_id');
            $table->dateTime('time_from')->nullable();
            $table->dateTime('time_to')->nullable();
            $table->integer('per_hour');
            $table->integer('surcharge'); // phụ thu
            $table->integer('deposit')->default(0); // tiền cọc
            $table->boolean('kind');
            $table->string('note')->nullable()->default(null);
            $table->dateTime('created')->default(date('Y-m-d H:i:s'));
            $table->foreign('pitch_id')->references('id')->on('pitch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('set_pitch');
    }
}
