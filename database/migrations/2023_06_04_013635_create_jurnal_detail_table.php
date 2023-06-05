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
        Schema::create('jurnal_detail', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jurnal');
            $table->date('tanggal');
            $table->string('kode_akun');
            $table->bigInteger('debet')->default(0);
            $table->bigInteger('kredit')->default(0);
            $table->timestamps();

            $table->foreign('kode_jurnal')->references('kode')->on('jurnal')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_detail');
    }
};
