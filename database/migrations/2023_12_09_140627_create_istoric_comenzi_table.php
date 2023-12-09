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
        Schema::create('istoric_comenzi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bilet_id')->constrained('bilete');
            $table->foreignId('client_id')->constrained('participanti');
            $table->integer('cantitate');
            // Alte câmpuri necesare
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
        Schema::dropIfExists('istoric_comenzi');
    }
};
