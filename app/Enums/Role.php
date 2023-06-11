<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case PEMILIK = 'pemilik';

    public function label()
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::PEMILIK => 'Pemilik',
        };
    }
}
