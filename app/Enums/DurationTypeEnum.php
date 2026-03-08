<?php
// app/Enums/DurationTypeEnum.php

namespace App\Enums;

enum DurationTypeEnum: string
{
    case ONE      = '1';
    case TWO      = '2';
    case THREE    = '3';
    case SIX      = '6';
    case TWELVE   = '12';
    case LIFETIME = 'lifetime';

    public function label(): string
    {
        return match ($this) {
            self::ONE      => '1 Bulan',
            self::TWO      => '2 Bulan',
            self::THREE    => '3 Bulan',
            self::SIX      => '6 Bulan',
            self::TWELVE   => '12 Bulan',
            self::LIFETIME => 'Lifetime',
        };
    }

    public function durationUnit(): string
    {
        return $this === self::LIFETIME ? 'lifetime' : 'month';
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($e) => [$e->value => $e->label()])
            ->toArray();
    }
}
