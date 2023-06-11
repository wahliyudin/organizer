<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $primaryKey = "kode";

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode',
        'kode_pesanan',
        'tanggal',
        'jumlah',
        'kode_akun',
        'kode_jurnal',
    ];

    protected function kode(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
        );
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->kode = IdGenerator::generate(['table' => $model->table, 'field' => 'kode', 'length' => 12, 'prefix' => "PO" . now()->format('ymd') . '-']);
        });
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'kode_pesanan', 'kode');
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'kode_jurnal', 'kode');
    }
}
