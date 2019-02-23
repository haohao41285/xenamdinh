<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class SignUpRequest extends FormRequest
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
            'customer_info.last_name' => 'required',
            'customer_info.first_name' => 'required',
            'customer.email' => 'required|email|unique:customers,email',
            'customer.password' => 'required|min:6',
        ];
    }
    public function withValidator(Validator $validator)
    {
        if ($validator->fails())
        {
            $validator->after(function ($validator) {
                $validator->errors()->add('is_modal', 'signUpModal');
            });
        }
    } 

}
