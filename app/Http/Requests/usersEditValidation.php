<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class usersEditValidation extends FormRequest
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
            'name' => [
                'required',
                'max:150',
                Rule::unique('users', 'name')->ignore($this->user),
            ],
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'address' => 'required|max:50',
            'postal_code' => 'required|regex:/[0-9]{4}[A-Z]{2}/|max:6',
            'city' => 'required|max:50',

        ];
    }
    public function messages()
    {
        return [
            //the messages in dutch
            'name.required' => 'Naam is verplicht',
            'name.max' => 'Naam mag niet langer zijn dan 150 karakters',
            'phone.required' => 'Telefoonnummer is verplicht',
            'phone.regex' => 'Telefoonnummer mag alleen cijfers bevatten',
            'phone.min' => 'Telefoonnummer moet minimaal 10 cijfers bevatten',
            'email.required' => 'Email is verplicht',
            'email.email' => 'Email moet een geldig email adres zijn',
            'address.required' => 'Adres is verplicht',
            'address.max' => 'Adres mag niet langer zijn dan 50 karakters',
            'postal_code.required' => 'Postcode is verplicht',
            'postal_code.regex' => 'Postcode moet een geldige postcode zijn',
            'postal_code.max' => 'Postcode mag niet langer zijn dan 6 karakters',
            'city.required' => 'Plaats is verplicht',
            'city.max' => 'Plaats mag niet langer zijn dan 50 karakters',


        ];
    }
}
