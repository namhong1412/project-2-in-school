<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePitchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitch', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('type_pitch_id', 2);
            $table->unsignedBigInteger('branch_id');
            $table->char('name', 50);
            $table->boolean('status')->default(0);
            $table->foreign('branch_id')->references('id')->on('branch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_pitch');
    }
}
