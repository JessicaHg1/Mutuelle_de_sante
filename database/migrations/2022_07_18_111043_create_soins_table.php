<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soins', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('date');
            $table->integer('montant');
            $table->foreignId('prestataire_id')->constrained('prestataires');
            $table->foreignId('prestation_id')->constrained('prestations');
            $table->foreignId('adherent_id')->constrained('adherents');
            $table->foreignId('beneficiaire_id')->constrained('beneficiaires');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soins', function (Blueprint $table) {
            $table->dropConstrainedForeignId('prestataire_id', 'prestation_id', 'adherent_id', 'beneficiaire_id');
        });

        Schema::dropIfExists('soins');
    }
}
