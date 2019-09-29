<?php

namespace Modules\ProductManagement\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateSubcategoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',

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
