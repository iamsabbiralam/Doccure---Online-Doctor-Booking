<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('doctors')->ignore($this->route),
                'min:5',
                'max:255'
            ],
            'specialist' => [
                'required',
                'min:5',
                'max:255'
            ],
            'chamber' => [
                'required',
                'min:5',
                'max:255'
            ],
            'cost' => [
                'required',
            ],
        ];
    }

    public function messages() {

        return [
            'name.unique' => 'Doctor name must be unique.'
        ];
    }
}