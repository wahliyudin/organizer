<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $table = 'jurnal';

    protected $primaryKey = "kode";

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode',
        'tanggal',
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

    public function jurnalDetails()
    {
        return $this->hasMany(JurnalDetail::class, 'kode_jurnal', 'kode');
    }
}
