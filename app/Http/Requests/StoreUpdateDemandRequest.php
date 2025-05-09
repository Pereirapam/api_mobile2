<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDemandRequest extends FormRequest
{

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
            'type' => [
                'required',
                'min:1',
                'max:225',
            ],
            'arrival_date' => [
                'required',
            ],
            'cycle' => [
                'required',
                'min:1',
                'max:225,'
            ],
            'mark_id' => [
                'required',
            ],
        ];
    }
}
