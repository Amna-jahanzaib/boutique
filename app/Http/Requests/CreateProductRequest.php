<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'        => [
                'min:3',
                'required'
            ],
            'category_id'        => [
                'required'
            ],
            'size'        => [
                'required'
            ],
            'small_description'        => [
                'required'
            ],
            'description'        => [
                'required'
            ],
            'original_price'        => [
                'required'
            ],
            'selling_price'        => [
                'required'
            ],
            'quantity'        => [
                'required'
            ],
            'trending'        => [
                'required'
            ],
            'featured'        => [
                'required'
            ],
            'status'        => [
                'required'
            ],
            'photo'        => [
                'required'
            ],

        ];
    }
}
