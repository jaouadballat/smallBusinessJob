<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AgencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user() && auth()->user()->isCeo();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'foundedAt' => ['required', 'min:4', 'max:4'],
            'company_logo' => ['mimes:jpeg,jpg,png', 'max:1000'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user()->id)],
        ];
    }


    public function storeAgency()
    {
        $file = $this->file('company_logo');

        if($file) {
            $fileName = sprintf('%s.%s',
                $this->user()->id,
                $file->extension()
            );
            $logo = $file->storeAs(
                '/img/icon',
                    $fileName
            );

            $this['logo'] = $logo;
        }

        $this['user_id'] = $this->user()->id;
        return $this->except('company_logo');
    }
}
