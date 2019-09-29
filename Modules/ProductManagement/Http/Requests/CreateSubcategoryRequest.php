<?php

namespace Modules\ProductManagement\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateSubcategoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'status' => 'required',
            'image' => 'file|image|max:5000',
            'category_id' => 'required',
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
