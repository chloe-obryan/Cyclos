<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Annonces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::create('annonces', function(Blueprint $table) {
			$table->increments('id');
			$table->Integer('users_id')->unsigned();
			$table->Integer('villes_id')->unsigned();
			$table->Integer('secteurs_id')->unsigned();
			$table->string('titre', 255);
			$table->string('promoteur');
			$table->string('type');
			$table->date('date');
			$table->string('adress1', 255);
			$table->integer('num_tel');
            $table->text('description')->nullable();
			$table->text('exigence')->nullable();
			
			$table->foreign('users_id')	
			->references('id')
            ->on('users')
            ->onDelete('restrict')
			->onUpdate('restrict');
			
			$table->foreign('villes_id')	
			->references('id')
            ->on('villes')
            ->onDelete('restrict')
			->onUpdate('restrict');
			
			$table->foreign('secteurs_id')	
			->references('id')
            ->on('secteurs')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('annonces');
	}
}
