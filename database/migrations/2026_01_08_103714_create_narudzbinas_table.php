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
        Schema::disableForeignKeyConstraints();

        Schema::create('narudzbinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proizvod_id')->constrained('proizvods');
            $table->foreignId('kupac_id')->constrained('kupacs');
            $table->integer('kolicina');
            $table->date('datum');
            $table->enum('status', ["kreirana","u_obradi","isporucena","otkazana"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('narudzbinas');
    }
};
