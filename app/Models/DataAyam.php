<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAyam extends Model
{
    use HasFactory;

    protected $table = 'data_ayam';

    protected $primaryKey = "kode";

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode',
        'harga',
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
            $model->kode = IdGenerator::generate(['table' => $model->table, 'field' => 'kode', 'length' => 6, 'prefix' => "A-"]);
        });
    }

    public function generateKode()
    {
        return IdGenerator::generate(['table' => 'data_ayam', 'field' => 'kode', 'length' => 6, 'prefix' => "A-"]);
    }
}
