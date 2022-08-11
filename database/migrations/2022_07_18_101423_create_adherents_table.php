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
            $table->string('name');
            $table->char('sexe');
            $table->date('date_naiss');
            $table->string('lieu_naiss');
            $table->string('nationalite');
            $table->date('date_inscription');
            $table->date('date_depart')->nullable();
            $table->string('photo')->nullable();
            $table->string('type_adhesion')->nullable();
            $table->integer('tel')->nullable();
            $table->string('profession')->nullable();
            $table->string('sit_matri')->nullable();
            $table->string('adresse_service')->nullable();
            $table->string('adresse_domicile')->nullable();
            $table->string('personne_a_prevenir')->nullable();
            $table->foreignId('mutuelle_id')->constrained('mutuelles')->nullable();
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
