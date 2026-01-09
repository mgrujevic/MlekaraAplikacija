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

        Schema::create('dobavljacs', function (Blueprint $table) {
            $table->id();
            $table->string('naziv', 50);
            $table->string('kontakt_osoba', 50)->nullable();
            $table->string('adresa', 50)->nullable();
            $table->string('telefon', 50)->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dobavljacs');
    }
};
