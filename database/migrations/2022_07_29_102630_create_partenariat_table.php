<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenariatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenariat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mutuelle_id');
            $table->foreignId('prestataire_id');
            $table->date('date');
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
        Schema::table('partenariat', function (Blueprint $table) {
            $table->dropConstrainedForeign('mutuelle_id', 'prestataire_id');
        });

        Schema::dropIfExists('partenariat');
    }
}
