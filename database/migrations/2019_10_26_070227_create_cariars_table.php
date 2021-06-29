<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCariarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cariars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('start_time');
            $table->integer('start_time_m');
            $table->string('end_time');
            $table->string('end_time_m');
            $table->text('text');
            $table->text('time');
            $table->integer('price');
            $table->integer('free')->default(0);
            $table->integer('icon')->nullable();
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
        Schema::dropIfExists('cariars');
    }
}
