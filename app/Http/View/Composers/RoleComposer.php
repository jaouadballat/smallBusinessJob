<?php


namespace App\Http\View\Composers;
use Illuminate\View\View;


class RoleComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = auth()->user();
        $data = [];

        if($user && $user->isFreelancer()) {
            $freelancer = $user->freelancer;
            $data['freelancer'] = $freelancer;
        } elseif ($user && $user->isCeo()) {
            $agency = $user->agency;
            $data['agency'] = $agency;
        } else {
            $data = [];
        }

        $view->with($data);
    }
}
