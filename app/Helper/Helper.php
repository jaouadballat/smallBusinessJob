<?php


namespace App\Helper;


class Helper
{

    const CURRENCY = '$';
    const CEO = 'ceo';
    const FREELANCER = 'freelancer';

    /**
     * @param $currency
     * @return string
     */
    public static function currencyFormat($currency)
    {
        return self::CURRENCY . round($currency);
    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function authenticated($user)
    {
        if($user->role === self::CEO) {
            if($user->hasRegisterAgency()) {
                return redirect()->route('agency.jobs');
            }
            return redirect()->route('ceo.dashboard');
        } elseif($user->role === self::FREELANCER) {
            return redirect()->route('freelancer.dashboard');
        } else {
            return redirect()->route('logout');
        }
    }
}
