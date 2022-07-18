<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdherentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherents', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('type_adhesion');
            $table->string('name');
            $table->char('sexe');
            $table->date('date_naiss');
            $table->string('lieu_naiss');
            $table->string('nationalite');
            $table->date('date_inscription');
            $table->date('date_depart')->nullable();
            $table->integer('tel');
            $table->string('profession');
            $table->string('sit_matri');
            $table->string('adresse_service')->nullable();
            $table->string('adresse_domicile');
            $table->string('personne_a_prevenir');
            $table->string('photo')->nullable();
            $table->foreignId('mutuelle_id')->constrained('mutuelles');
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
        Schema::table('adherents', function (Blueprint $table) {
            $table->dropConstrainedForeign('mutuelle_id');
        });

        Schema::dropIfExists('adherents');
    }
}
