<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalDetail extends Model
{
    use HasFactory;

    protected $table = 'jurnal_detail';

    protected $fillable = [
        'kode_jurnal',
        'tanggal',
        'kode_akun',
        'debet',
        'kredit',
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'kode_akun', 'kode');
    }
}
