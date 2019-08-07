<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartementEmployeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement_employe', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('employe_id');
            $table->foreign('departement_id')->references('id')->on('departements');
            $table->foreign('employe_id')->references('id')->on('employes');
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
        Schema::dropIfExists('departement_employe');
    }
}
