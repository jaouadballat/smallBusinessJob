<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFreelancerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user() && auth()->user()->isFreelancer();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'profile-image' => ['required', 'mimes:jpg,jpeg,png,bmp', 'max:4096'],
        ];
    }

    public function refactoreRequest()
    {
        $file = $this->file('profile-image');

        if($file) {
            $fileName = sprintf('%s.%s',
                $this->user()->id,
                $file->extension()
            );
            $avatar = $file->storeAs(
                '/avatar',
                $fileName
            );

            $this['avatar'] = $avatar;
        }
        return $this->except('profile-image');
    }
}
