<?php

namespace App\Http\Requests\food;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodCategoryRequest extends FormRequest
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
     * @return array<string
     */
    public function rules(): array
    {
        return [
            'title'=>'required',
            'address'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
        ];
    }
}
