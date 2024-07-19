<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('annonces')) {
            Schema::create('annonces', function (Blueprint $table) {
                $table->id();
                $table->string('titre');
                $table->text('description');
                $table->decimal('prix', 10, 2);
                $table->string('localisation');
                $table->integer('surface');
                $table->integer('nombre_chambres');
                $table->integer('nombre_salles_de_bain');
                $table->string('type');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
