<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_demande')->nullable();
            $table->string('libelle')->nullable();
            $table->string('type_conge')->nullable();
            $table->date('date_depart')->nullable();
            $table->date('date_retour')->nullable();
            $table->string('solde')->nullable();
            $table->string('statut')->nullable();
            $table->string('nbre_jour')->nullable();
            $table->longText('commentaire')->nullable();
            $table->string('validation')->nullable();
            $table->unsignedBigInteger('employe_id');
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
        Schema::dropIfExists('conges');
    }
}
