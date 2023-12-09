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
        Schema::create('bilete_individuale', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bilet_id')->constrained('bilete');
            $table->foreignId('participant_id')->constrained('participanti');
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
        Schema::dropIfExists('bilete_individuale');
    }
};
