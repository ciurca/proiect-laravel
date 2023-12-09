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
        Schema::create('colaboratori', function (Blueprint $table) {
            $table->id();
            $table->string('nume');
            $table->string('email')->unique();
            $table->string('telefon')->nullable();
            $table->string('tip'); // Exemplu: sponsor, partener etc.
            $table->decimal('suma', 8, 2)->nullable(); // Suma implicată în colaborare
            $table->text('premii')->nullable(); // Premii oferite, dacă este cazul
            $table->string('tip_parteneriat')->nullable(); // Tipul de parteneriat
            // Alte coloane necesare
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
        Schema::dropIfExists('colaboratori');
    }
};
