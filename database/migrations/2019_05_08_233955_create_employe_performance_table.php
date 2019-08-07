<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployePerformanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_performance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('performance_id');
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->foreign('performance_id')->references('id')->on('performances');
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
        Schema::dropIfExists('employe_performance');
    }
}
