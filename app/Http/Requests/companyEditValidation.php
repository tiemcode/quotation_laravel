<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class companyEditValidation extends FormRequest
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
            'company_name' => 'required|max:255',
            'contact_person' => 'required|max:255',
            'address' => 'required|max:255',
            'postal_code' => 'required|regex:/[0-9]{4}[A-Z]{2}/|max:6',
            'city' => 'required|max:255',
            //PHONE number regex
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email',
            "logo" => 'mimes:png,jpg|max:2000'
        ];
    }
    public function messages()
    {
        return [
            'company_name.required' => 'Bedrijfsnaam is verplicht',
            'contact_person.required' => 'Contactpersoon is verplicht',
            'address.required' => 'Adres is verplicht',
            'postal_code.required' => 'Postcode is verplicht',
            'city.required' => 'Stad is verplicht',
            'phone_number.required' => 'Telefoonnummer is verplicht',
            'email.required' => 'Email is verplicht',
            'company_name.max' => 'Bedrijfsnaam mag niet langer zijn dan 255 karakters',
            'contact_person.max' => 'Contactpersoon mag niet langer zijn dan 255 karakters',
            'address.max' => 'Adres mag niet langer zijn dan 255 karakters',
            'postal_code.max' => 'Postcode mag niet langer zijn dan 255 karakters',
            'city.max' => 'Stad mag niet langer zijn dan 255 karakters',
            'phone_number.regex' => 'Telefoonnummer moet een geldig telefoonnummer zijn',
            'email.email' => 'Email moet een geldig email adres zijn',
            'logo.mimes' => 'Logo moet een png of jpg bestand zijn',
            'logo.max' => 'Logo mag niet groter zijn dan 2MB',
        ];
    }
}
