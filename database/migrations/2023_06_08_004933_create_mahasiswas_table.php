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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nbi')->unique();
            $table->foreignId('fakultas_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('program_studis_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('fakultas_id')->references('id')->on('fakultases')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('program_studi_id')->references('id')->on('fakultases')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
