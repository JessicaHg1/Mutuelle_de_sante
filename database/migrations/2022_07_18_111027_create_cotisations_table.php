<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotisations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('montant');
            $table->boolean('etat')->nullable();
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
        Schema::table('cotisations', function (Blueprint $table) {
            $table->dropConstrainedForeign('beneficiaire_id');
        });

        Schema::dropIfExists('cotisations');
    }
}
