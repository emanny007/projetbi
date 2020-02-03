<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricule')->nullable();
            $table->string('numero_sss')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('role')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('mail_perso')->nullable();
            $table->string('tel_pro')->nullable();
            $table->string('tel_perso')->nullable();
            $table->string('contact_urgent')->nullable();
            $table->string('entite')->nullable();
            $table->string('sexe')->nullable();
            $table->string('photo')->nullable();
            $table->string('civilite')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->string('nbre_enfant')->nullable();
            $table->string('nationnalite')->nullable();
            $table->string('origine')->nullable();
            $table->string('secteur')->nullable();
            $table->string('categorie')->nullable();
            $table->string('departement')->nullable();
            $table->string('statut')->nullable();
            $table->string('pays')->nullable();
            $table->string('age')->nullable();
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
        Schema::dropIfExists('employes');
    }
}
