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
        $freelancer = auth()->user()->freelancer ?? "";
        $agency = auth()->user()->agency ?? "";
        $view->with([
            'freelancer' => $freelancer,
            'agency' => $agency,
        ]);
    }
}
