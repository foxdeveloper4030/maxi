<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsermessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usermessages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userthread_id');
            $table->unsignedBigInteger('employee_id');
            $table->text('message');
            $table->string('file_name')->nullable();
            $table->boolean('read')->default(false);
            $table->integer('private')->default(1);
            $table->ipAddress('ip_address');

            $table->foreign('userthread_id')
                ->references('id')
                ->on('userthreads')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('usermessages');
    }
}
