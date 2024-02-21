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
        Schema::create('pkl', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->foreignId('id_siswa')->constrained('siswa');
            $table->foreignId('id_dudi')->constrained('dudi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkl');
    }
};
