<?php
/**
 * Created by PhpStorm.
 * User: Daniyal
 * Date: 9/13/2019
 * Time: 11:34 PM
 */

namespace Modules\Usermanagement\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:3|confirmed',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }
}