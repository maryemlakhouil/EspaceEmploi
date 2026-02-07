<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'contract_type' => ['required','string','max:255'],
            'image' => ['nullable','file','mimes:jpg,png','max:2048'],
        ];
    }
}
