<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('titre');
            $table->text('description');
            $table->decimal('prix', 10, 2);
            $table->string('localisation');
            $table->integer('surface');
            $table->integer('nombre_chambres');
            $table->integer('nombre_salles_de_bain');
            $table->string('type');
            $table->json('photos')->nullable(); // Ajoutez ce champ pour stocker les photos
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
