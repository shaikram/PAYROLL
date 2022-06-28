<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
          $table->id('empId');
          $table->string('username');
          $table->string('fname');
          $table->string('mname');
          $table->string('lname');
          $table->string('designation');
          $table->string('contactNo');
          $table->longText('address');
          $table->string('sss')->unique();
          $table->string('hmdf')->unique();
          $table->string('philhealth')->unique();
          $table->string('tin')->unique();
          $table->string('status');
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
        Schema::dropIfExists('employees');
    }
}
