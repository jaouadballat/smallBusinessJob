<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

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
            'title' => 'required',
            'profile-avatar' => ['sometimes', 'mimes:jpg,jpeg,png,bmp', 'max:4096'],
            'profile-resume' => ['sometimes', 'mimes:pdf, doc, docx', 'max:4096'],
        ];
    }

    public function refactoreRequest()
    {
        $file = $this->file('profile-avatar');
        $resume = $this->file('profile-resume');

        if($file) {
            $fileName = sprintf('%s.%s',
                $this->user()->id,
                $file->extension()
            );
            $avatar = $file->storeAs(
                '',
                $this->user()->id,
                'google'
            );

            $this['avatar'] = $avatar;
        }

        if($resume) {
            $fileName = sprintf('%s.%s',
                $this->user()->id,
                $resume->extension()
            );
            $resume = $resume->storeAs(
                '/resume',
                $fileName
            );

            $this['resume'] = $resume;
        }



            return $this->except(['profile-avatar', 'profile-resume']);
    }

}
