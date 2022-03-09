<?php

namespace MichelCalisto\Site\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlider extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ];
    }
}
