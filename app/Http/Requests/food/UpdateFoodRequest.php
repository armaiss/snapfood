<?php

namespace App\Http\Requests\food;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodRequest extends FormRequest
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
            'name' => ['required'],
            'materials' => ['required'],
            'price' => ['required','numeric'],
            'food_category_id' => ['required'],
            'restaurant_id' => ['required'],
        ];
    }
}
