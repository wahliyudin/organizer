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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->string('kode')->primary();
            $table->string('kode_pesanan');
            $table->date('tanggal');
            $table->bigInteger('jumlah');
            $table->string('kode_akun');
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
        Schema::dropIfExists('pembayaran');
    }
};
