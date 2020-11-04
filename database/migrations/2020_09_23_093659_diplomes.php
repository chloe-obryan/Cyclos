<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diplomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::create('diplomes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('intitule', 255);
			$table->timestamps();
			
		});
	}

	public function down()
	{
		Schema::drop('diplomes');
	}
}
