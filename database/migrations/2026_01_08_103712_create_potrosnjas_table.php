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

        Schema::create('potrosnjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serija_proizvoda_id')->constrained();
            $table->foreignId('sirovina_id')->constrained('sirovinas');
            $table->integer('kolicina');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potrosnjas');
    }
};
