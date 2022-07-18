<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->char('sexe');
            $table->date('date_naiss');
            $table->string('lieu_naiss');
            $table->string('nationalite')->nullable();
            $table->date('date_inscription')->nullable();
            $table->date('date_depart')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('adherent_id')->constrained('adherents');
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
        Schema::table('beneficiaires', function (Blueprint $table) {
            $table->dropConstrainedForeign('adherent_id');
        });

        Schema::dropIfExists('beneficiaires');
    }
}
