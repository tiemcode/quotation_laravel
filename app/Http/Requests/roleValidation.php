<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class roleValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => "required|max:50|min:2|unique:roles,name"
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Naam is verplicht',
            'name.max' => 'Naam mag niet langer zijn dan 50 karakters',
            'name.min' => 'Naam moet minimaal 2 karakters lang zijn',
            'name.unique' => 'deze naam is al ingebruik'
        ];
    }
}
