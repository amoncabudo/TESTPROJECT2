<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anuncis', function (Blueprint $table) {
            $table->id();
            $table->string('titol');
            $table->string('descripcio')->nullable();
            $table->string('time')->nullable();
            $table->string('date')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('categoria_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncis');
    }
};
