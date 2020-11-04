<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commentaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::create('commentaires', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('contenu');
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('annonce_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('commentaires');
	}
}
