<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutuellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutuelles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('logo');
            $table->date('date_creation');
            $table->string('region');
            $table->string('adresse');
            $table->integer('tel');
            $table->string('email');
            $table->integer('montant_cotisation');
            $table->integer('nb_pers_a_charge_admis');
            $table->integer('montant_adhesion');
            $table->string('periode_observation');
            $table->string('periodicite_cotisation');
            $table->foreignId('pays_id');
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
        Schema::table('mutuelles', function (Blueprint $table) {
            $table->dropConstrainedForeign('pays_id');
        });

        Schema::dropIfExists('mutuelles');
    }
}
