<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAyam extends Model
{
    use HasFactory;

    protected $table = 'data_ayam';

    protected $primaryKey = "kode";

    protected $incrementing = false;

    protected $fillable = [
        'kode',
        'harga',
    ];
}
