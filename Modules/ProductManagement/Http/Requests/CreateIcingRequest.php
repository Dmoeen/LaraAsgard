<?php

namespace Modules\ProductManagement\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateIcingRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'status' => 'required',
            'price'=>'required',
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
