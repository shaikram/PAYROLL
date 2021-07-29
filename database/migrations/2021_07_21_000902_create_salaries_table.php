<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id('sId');
            $table->string('clientId');
            $table->string('userId');
            $table->date('from');
            $table->date('to');
            $table->string('dtr');
            $table->string('empId');
            $table->string('duty');
            $table->string('rate');
            $table->string('ot');
            $table->string('op');
            $table->string('noh');
            $table->string('holType');
            $table->string('gp');
            $table->string('sss');
            $table->string('philhealth');
            $table->string('hmdf');
            $table->string('cb');
            $table->string('ca');
            $table->string('td');
            $table->string('np');
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
        Schema::dropIfExists('salaries');
    }
}
