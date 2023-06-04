<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $primaryKey = "kode";

    protected $incrementing = false;

    protected $fillable = [
        'kode',
        'kode_pesanan',
        'tanggal',
        'jumlah',
        'kode_jurnal',
    ];
}
