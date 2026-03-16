<?php

namespace App\Helpers;

class Helpers
{
    public static function formatCurrency($amount)
    {
        return number_format($amount, 0, ',', '.');
    }
}
