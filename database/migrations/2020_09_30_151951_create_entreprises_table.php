<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('users_id')->unsigned();
            $table->Integer('secteurs_id')->unsigned();
            $table->Integer('villes_id')->unsigned();
            $table->Integer('pays_id')->unsigned();
            $table->string('nom');
            $table->string('adress', 255);
			$table->string('codePostal',45);
            $table->string('siteInternet',200);
            $table->string('logo');
            
            $table->foreign('pays_id')
            ->references('id')
            ->on('pays')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('secteurs_id')
            ->references('id')
            ->on('secteurs')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('villes_id')
            ->references('id')
            ->on('villes')
            ->onDelete('restrict')
            ->onUpdate('restrict');

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
        Schema::dropIfExists('entreprises');
    }
}
