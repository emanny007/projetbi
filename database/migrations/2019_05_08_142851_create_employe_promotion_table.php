<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployePromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_promotion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('promotion_id');
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->foreign('promotion_id')->references('id')->on('promotions');
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
        Schema::dropIfExists('employe_promotion');
    }
}
