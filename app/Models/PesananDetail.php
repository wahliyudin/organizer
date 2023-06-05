<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $table = 'pesanan_detail';

    protected $fillable = [
        'kode_pesanan',
        'kode_data_ayam',
        'kuantitas',
    ];

    public function dataAyam()
    {
        return $this->belongsTo(DataAyam::class, 'kode_data_ayam', 'kode');
    }
}
