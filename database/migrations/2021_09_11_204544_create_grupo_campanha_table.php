<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoCampanhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_campanha', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo')->references('id')->on('grupos');
            $table->foreignId('campanha')->references('id')->on('campanhas');
            $table->char('ativo', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_campanha');
    }
}
