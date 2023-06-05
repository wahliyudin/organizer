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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->string('kode')->primary();
            $table->string('kode_pelanggan');
            $table->string('kode_akun');
            $table->string('keterangan');
            $table->date('tanggal');
            $table->string('kode_jurnal');
            $table->timestamps();

            $table->foreign('kode_jurnal')->references('kode')->on('jurnal')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
