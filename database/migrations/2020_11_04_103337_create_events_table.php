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
            $table->increments('id');

            $table->string('event_name')->nullable();

            $table->datetime('event_date')->nullable();

            $table->datetime('event_created')->nullable();

            // $table->softDeletes()->nullable();

            $table->integer('is_recent')->unsigned();

            $table->timestamps();

            // $table->int('is_recent')-
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
