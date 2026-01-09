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

        Schema::create('nabavkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dobavljac_id')->constrained('dobavljacs');
            $table->foreignId('sirovina_id')->constrained('sirovinas');
            $table->dateTime('datum');
            $table->integer('kolicina');
            $table->decimal('cena', 10, 2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nabavkas');
    }
};
