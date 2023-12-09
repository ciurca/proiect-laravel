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
        Schema::create('event_speaker', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id'); // Tipul de date trebuie să corespundă cu cel al coloanei `id` din tabela `events`
            $table->unsignedBigInteger('speaker_id'); // La fel aici, trebuie să corespundă cu coloana `id` din tabela `speakers`
            $table->foreign('event_id')->references('id')->on('evenimente')->onDelete('cascade');
            $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('cascade');
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
        Schema::dropIfExists('event_speaker');
    }
};
