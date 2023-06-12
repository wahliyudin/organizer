<?php

namespace App\Models;

use App\Enums\JenisAkun;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akun';

    protected $primaryKey = 'kode';

    protected $keyType = 'string';

    protected $fillable = [
        'kode',
        'nama',
        'jenis_akun'
    ];

    protected $casts = [
        'jenis_akun' => JenisAkun::class
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
}