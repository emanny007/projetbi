<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvThequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_theques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('poste_occupe')->nullable();
            $table->string('poste_precedent')->nullable();
            $table->string('anciennete')->nullable();
            $table->string('entreprise_precedente')->nullable();
            $table->string('diplome')->nullable();
            $table->string('annee_diplome')->nullable();
            $table->string('ecole')->nullable();
            $table->string('cv')->nullable();
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
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
        Schema::dropIfExists('cv_theques');
    }
}
