<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'company' => ['required','string','max:255'],
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'type_contrat' => ['required','string','max:255'], 
            'image' => ['required','file','mimes:jpg,png','max:2048'],
         ]; 
    }

    public function attributes(): array
    {
        return [
            'type_contrat' => 'type de contrat',
        ];
    }
}
