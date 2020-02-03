<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('team1name')->nullable();
            $table->string('team2name')->nullable();
            $table->double('team1wincoef')->nullable();
            $table->double('team2wincoef')->nullable();
            $table->double('draw_coef')->nullable();
            $table->string('score')->nullable()->default('0:0');
            $table->string('video_link')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('finished_at')->nullable();
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
        Schema::dropIfExists('events');
    }
}
