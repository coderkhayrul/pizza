<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required| string|min:3|max:40',
            'description' => 'required',
            'small_pizza_price' => 'required|number',
            'medium_pizza_price' => 'required|number',
            'large_pizza_price' => 'required|number',
            'category' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ];
    }
}
