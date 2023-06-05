<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $primaryKey = "kode";

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode',
        'kode_pelanggan',
        'tanggal',
        'kode_akun',
        'keterangan',
        'kode_jurnal',
    ];

    protected function kode(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
        );
    }

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $model->kode = IdGenerator::generate(['table' => $model->table, 'field' => 'kode', 'length' => 6, 'prefix' => "A-"]);
    //     });
    // }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'kode_pelanggan', 'kode');
    }

    public function pesananDetails()
    {
        return $this->hasMany(PesananDetail::class, 'kode_pesanan', 'kode');
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'kode_jurnal', 'kode');
    }
}
