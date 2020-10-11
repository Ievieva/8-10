<?php declare(strict_types=1);

class Calculator
{
    public static function toUnits(int $amount): int
    {
        return $amount * 100;
    }

    public static function fromUnits(float $amount): string
    {
        return number_format($amount / 100, 2);
    }

    public static function calculateInvestments(
        int $amount,
        int $years,
        int $percent
    ): string
    {
        $sum = self::toUnits($amount);
        for ($i = 0; $i < $years; $i++) {
            $sum += $sum / 100 * $percent;
        }
        return self::fromUnits($sum);
    }
}
