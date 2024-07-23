<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotosToAnnoncesTable extends Migration
{
    public function up()
    {
        Schema::table('annonces', function (Blueprint $table) {
            $table->text('photos')->nullable(); // Ajouter la colonne photos
        });
    }

    public function down()
    {
        Schema::table('annonces', function (Blueprint $table) {
            $table->dropColumn('photos'); // Supprimer la colonne photos
        });
    }
}
