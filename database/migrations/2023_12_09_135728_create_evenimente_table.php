<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenimente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizator_id')->constrained('organizatori');
            $table->string('titlu');
            $table->text('descriere');
            $table->dateTime('data_inceput');
            $table->dateTime('data_sfarsit');
            $table->string('locatie');
            // Adaugă alte coloane necesare
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
        Schema::dropIfExists('evenimente');
    }
};
