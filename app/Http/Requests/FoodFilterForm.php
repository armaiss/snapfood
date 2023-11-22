<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodFilterForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'food_category_id' => 'nullable|exists:food_categories,id',
        ];
    }
}
