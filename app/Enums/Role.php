<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case MODERATOR = 'moderator';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
