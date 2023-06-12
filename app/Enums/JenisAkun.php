<?php

namespace App\Enums;

enum JenisAkun: int
{
    case AKTIVA_LANCAR = 1;
    case INVESTASI_JANGKA_PANJANG = 2;
    case AKTIVA_TETAP = 3;
    case AKTIVA_TETAP_TIDAK_BERWUJUD = 4;
    case AKTIVA_LAIN_LAIN = 5;
    case KEWAJIBAN = 6;
    case KEWAJIBAN_JANGKA_PANJANG = 7;
    case EKUITAS = 8;
    case PENDAPATAN = 9;
    case BEBAN = 10;

    public function label()
    {
        return match ($this) {
            self::AKTIVA_LANCAR => 'Aktiva Lancar',
            self::INVESTASI_JANGKA_PANJANG => 'Investasi Jangka Panjang',
            self::AKTIVA_TETAP => 'Aktiva Tetap',
            self::AKTIVA_TETAP_TIDAK_BERWUJUD => 'Aktiva Tetap Tidak Berwujud',
            self::KEWAJIBAN => 'Kewajiban',
            self::AKTIVA_LAIN_LAIN => 'Aktiva Lain - Lain',
            self::KEWAJIBAN_JANGKA_PANJANG => 'Kewajiban Jangka Panjang',
            self::EKUITAS => 'Ekuitas',
            self::PENDAPATAN => 'Pendapatan',
            self::BEBAN => 'Beban',
        };
    }

    public function kode()
    {
        return match ($this) {
            self::AKTIVA_LANCAR => 10,
            self::INVESTASI_JANGKA_PANJANG => 11,
            self::AKTIVA_TETAP => 12,
            self::AKTIVA_TETAP_TIDAK_BERWUJUD => 13,
            self::AKTIVA_LAIN_LAIN => 14,
            self::KEWAJIBAN => 20,
            self::KEWAJIBAN_JANGKA_PANJANG => 21,
            self::EKUITAS => 30,
            self::PENDAPATAN => 40,
            self::BEBAN => 50,
        };
    }
}
