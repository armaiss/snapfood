<?php

namespace App\Http\Requests\address;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'longitude'=>'required',
            'latitude'=>'required',
        ];
    }
}
