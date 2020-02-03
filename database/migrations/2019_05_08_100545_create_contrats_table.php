<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_contrat')->nullable();
            $table->string('montant_net')->nullable();
            $table->string('montant_brut')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')->references('id')->on('employes')
                  ->onDelete('cascade');
            $table->timestamps();
        });

      //  DB::statement("ALTER TABLE contrats ADD CONSTRAINT FK_contrats FOREIGN KEY (employe_id) REFERENCES employes(id) ON DELETE CASCADE");
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats');
    }
}
