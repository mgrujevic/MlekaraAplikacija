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
            $table->foreignId('proizvod_id')->constrained('proizvodis');
            $table->foreignId('kupac_id')->constrained('kupcis');
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
