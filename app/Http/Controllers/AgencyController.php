<?php

namespace App\Http\Controllers;

use App\Services\AgencyService;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * @var AgencyService
     */
    private $service;

    public function __construct(AgencyService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('ceo');
    }

    public function create(Request $request)
    {
        $file = $request->file('company_logo');

        if($file) {
            $fileName = sprintf('%s.%s',
                $request->user()->id,
                $file->extension()
            );
            $logo = $file->storeAs(
                'logos',
                $fileName
            );

            $request['logo'] = $logo;
        }

        $request['user_id'] = $request->user()->id;
        $this->service->save($request->except('company_logo'));

    }
}
