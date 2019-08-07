<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeSanctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_sanction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('sanction_id');
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->foreign('sanction_id')->references('id')->on('sanctions');
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
        Schema::dropIfExists('employe_sanction');
    }
}
