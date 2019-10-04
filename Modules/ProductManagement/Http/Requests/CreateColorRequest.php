<?php

namespace Modules\ProductManagement\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateColorRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name'=>'required',
            'price'=>'required',
            'status'=>'required',
            'type'=>'required',
            'image'=>'required|max:5000',
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
