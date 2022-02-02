<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormValidation extends FormRequest
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
                'name' => 'required|max:255',
                'slug' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'This name is also required',
        ];
    }

}
