<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('diplomes_id')->unsigned();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('nom', 255);
			$table->string('prenom', 255);
			$table->string('genre', 5);
            $table->date('date_nais');
            $table->Integer('villes_id')->unsigned();
            $table->Integer('secteurs_id')->unsigned();
            $table->string('num_tel',20);
            $table->string('fonction',20);
            $table->string('lienUtil',200);
            $table->text('description')->nullable();
            $table->string('photo',200);
            $table->boolean('isEtp')->default(false);
            
            $table->foreign('diplomes_id')
            ->references('id')
            ->on('diplomes')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->foreign('villes_id')
            ->references('id')
            ->on('villes')
            ->onUpdate('restrict')
            ->onDelete('restrict');

            $table->foreign('secteurs_id')
            ->references('id')
            ->on('secteurs')
            ->onUpdate('restrict')
            ->onDelete('restrict');

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
        Schema::dropIfExists('users');
    }
}
