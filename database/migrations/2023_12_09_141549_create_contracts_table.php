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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eveniment_id');
            $table->unsignedBigInteger('colaborator_id');
            $table->timestamps();

            // Asigură-te că tabelele 'evenimente' și 'colaboratori' sunt create înainte de a rula această migrare
            // De asemenea, coloanele referite trebuie să fie de tip 'unsignedBigInteger' dacă 'id'-ul este de acest tip

            $table->foreign('eveniment_id')->references('id')->on('evenimente')->onDelete('cascade');
            $table->foreign('colaborator_id')->references('id')->on('colaboratori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
