<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class quotesValidation extends FormRequest
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
            "company" => "required",
            "number" => "required|max:50|min:6|unique:quotes,quotes_number",
            "desc" => "required|max:255",
            "file" => "nullable|file|mimes:docx,pdf,doc,txt",
        ];
    }
    //messages in dutch
    public function messages()
    {
        return [
            "company_id.required" => "Bedrijf is verplicht",
            "number.required" => "Offerte nummer is verplicht",
            "number.max" => "Offerte nummer mag niet langer zijn dan 50 karakters",
            "number.min" => "Offerte nummer moet minimaal 6 karakters lang zijn",
            "desc.required" => "Omschrijving is verplicht",
            "desc.max" => "Omschrijving mag niet langer zijn dan 255 karakters",
            "file.file" => "Bestand moet een bestand zijn",
            "file.mimes" => "Bestand moet een docx, pdf, doc of txt bestand zijn",

        ];
    }
}
