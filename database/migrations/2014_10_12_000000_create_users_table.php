<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
          $table->id('userId');
          $table->string('username');
          $table->string('firstName');
          $table->string('middleName');
          $table->string('lastName');
          $table->string('email')->unique();
          $table->string('password');
          $table->longText('address');
          $table->string('position');
          $table->integer('positionNum');
          $table->string('status');
          $table->string('contactNo');
          $table->timestamp('email_verified_at')->nullable();
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
