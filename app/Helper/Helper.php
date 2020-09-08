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
            $freelancerId = $user->freelancer->id;
            return redirect()->route('freelancer.profile.edit', ['id' => $freelancerId]);
        } else {
            return redirect()->route('logout');
        }
    }
}
