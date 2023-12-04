<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usersAddValidation extends FormRequest
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
            'name' => 'required|max:150|unique:users,name',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|',
            'address' => 'required|max:50',
            'postal_code' => 'required|regex:/[0-9]{4}[A-Z]{2}/|max:6',
            'city' => 'required|max:50',
            'password' => 'required|max:100',
            'password_confirmation' => 'required|same:password|max:100',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Naam is verplicht',
            'phone.required' => 'Telefoonnummer is verplicht',
            'email.required' => 'Email is verplicht',
            'address.required' => 'Adres is verplicht',
            'postal_code.required' => 'Postcode is verplicht',
            'city.required' => 'Stad is verplicht',
            'password.required' => 'Wachtwoord is verplicht',
            'password_confirmation.required' => 'Wachtwoord bevestiging is verplicht',
            'name.max' => 'Naam mag niet langer zijn dan 150 karakters',
            'phone.regex' => 'Telefoonnummer moet een geldig telefoonnummer zijn',
            'email.email' => 'Email moet een geldig email adres zijn',
            'address.max' => 'Adres mag niet langer zijn dan 50 karakters',
            'postal_code.max' => 'Postcode mag niet langer zijn dan 6 karakters',
            'city.max' => 'Stad mag niet langer zijn dan 50 karakters',
            'password.max' => 'Wachtwoord mag niet langer zijn dan 100 karakters',
            'password_confirmation.max' => 'Wachtwoord bevestiging mag niet langer zijn dan 100 karakters',
            'password_confirmation.same' => 'Wachtwoord en wachtwoord bevestiging moeten hetzelfde zijn',
            'phone.min' => 'Telefoonnummer moet minimaal 10 karakters bevatten',
            'postal_code.regex' => 'Postcode moet een geldige postcode zijn',

        ];
    }
}
