<?php


namespace App\Helper;


class Helper
{
    const CURRENCY = '$';

    public static function currencyFormat($currency)
    {
        return self::CURRENCY . round($currency);
    }
}
