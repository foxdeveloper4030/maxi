<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('user_temp')->unique()->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->boolean('newsletter')->default(0);
            $table->ipAddress('ip_registration_newsletter')->nullable();
            $table->timestamp('newsletter_date_add')->nullable();
            $table->string('password');
            $table->string('secure_key')->nullable();
            $table->string('website')->nullable();
            $table->timestamp('last_passwd_gen')->nullable();
            $table->string('activation_code')->nullable();
            $table->boolean('active')->default(true);
            $table->tinyInteger('sex_id')->default(-1);
            $table->text('about_me')->nullable();
            $table->string('avatar')->nullable();
            $table->ipAddress('user_ip');
            $table->string('birthday')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
