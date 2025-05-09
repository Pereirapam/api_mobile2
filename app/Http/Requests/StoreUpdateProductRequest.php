<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
            'name' => [
                    'required',
                    'min:1',
                    'max:255',
            ],
            'description' => [
                    'required',
                    'min:1',
                    'max:1000',
            ],
            'price' => [
                    'required',
            ],
            'expiration_date' => [
                    'required',
            ],
            'quantity' => [
                    'required',
            ],
            'mark_id' => [
                    'required',
            ],

        ];
    }
}
