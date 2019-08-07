<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartEmployeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depart_employe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('depart_id');
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->foreign('depart_id')->references('id')->on('departs');
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
        Schema::dropIfExists('depart_employe');
    }
}
