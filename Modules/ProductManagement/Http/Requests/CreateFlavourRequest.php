<?php

namespace Modules\ProductManagement\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateFlavourRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'status' => 'required',
            'expiry_date'=>'required',
            'image' => 'file|image|max:5000',
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
