<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'description' => 'min:10|max:5000',
            'thumb' => 'max:5000',
            'price' => 'numeric',
            'series' => 'min:3|max:100',
            'sale_date' => 'date',
            'type' => 'min:3|max:100',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno 3 caratteri',
            'title.max' => 'Il titolo deve avere al massimo 100 caratteri',
            'description.min' => 'La descrizione deve avere almeno 10 caratteri',
            'price.numeric' => 'Il prezzo deve essere un valore numerico',
            'sale_date.date' => 'La data deve avere un formato valido'
        ];
    }
}