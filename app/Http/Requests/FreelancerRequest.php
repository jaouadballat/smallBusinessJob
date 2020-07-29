<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FreelancerRequest extends FormRequest
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
            'cv' => ['required', 'mimes:pdf', 'max:10000'],
        ];
    }

    public function storeResume()
    {
        $file = $this->file('cv');

        if($file) {
            $fileName = sprintf('%s.%s',
                $this->user()->id,
                $file->extension()
            );
            $resume = $file->storeAs(
                '/resumes',
                $fileName
            );

            $this['resume'] = $resume;
        }

        return $this->except('cv');
    }
}

