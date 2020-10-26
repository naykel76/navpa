<?php

namespace Naykel\Navpa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidatePage extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'order.integer' => 'The order must be a positive or negative number.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'show_title' => 'sometimes',
            'slug' => 'sometimes',
            'headline' => 'sometimes|max:255',
            'description' => 'sometimes|max:255',
            'body' => 'sometimes',
            'order' => 'sometimes|integer',
            'image' => 'sometimes|file|image|max:2000',
            'template' => 'sometimes',
            'layout_type' => 'sometimes',
            'published_at'    => 'sometimes',
        ];
    }

    protected function prepareForValidation()
    {

        // NK:!! Date update regardless. Needs to update only if dirty
        if(request('published_at')){
            $this->merge([
                'published_at' => now()
            ]);
        }

        if (request('order') === null) {
            $this->merge([
                'order' => 0,
            ]);
        }
    }
}
