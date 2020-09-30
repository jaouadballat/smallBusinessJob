<?php


namespace App\Helper;


use Illuminate\Support\Facades\Storage;

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

    /*
     * return link from google drive
     */
    public static function getLink($value)
    {
        $link = collect(Storage::drive('google')
            ->listContents('', false))
            ->where('name', $value)
            ->first();

        return  $link ? $link["path"] : 'jaouad.png';

    }
}
