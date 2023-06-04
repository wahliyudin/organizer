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
            $table->string('kode_akun');
            $table->bigInteger('debet');
            $table->bigInteger('kredit');
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
