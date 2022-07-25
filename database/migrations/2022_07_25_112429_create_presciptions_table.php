<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresciptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presciptions', function (Blueprint $table) {
            $table->id();
            $table->string('benef');
            $table->date('date');
            $table->integer('montant');
            $table->foreignId('prestataire_id')->constrained('prestataires');
            $table->foreignId('prestation_id')->constrained('prestations');
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
        Schema::table('presciptions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('prestataire_id', 'prestation_id');
        });

        Schema::dropIfExists('presciptions');
    }
}
