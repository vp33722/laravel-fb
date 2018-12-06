<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
                'password'=>'required',
                'confirm'=>'required|same:password'
        ];
    }
    
    public function messages()
    {
    
        return
        [
       'password.required'=>'password required',
       'confirm.required'=>'Confirm Password Required',
       'confirm.same'=>'Password does not match' 
        ];
    }
}
