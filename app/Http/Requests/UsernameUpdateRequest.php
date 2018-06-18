<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsernameUpdateRequest extends FormRequest
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
            'username' => 'required|string|',
            'user_id' => 'required',
        ];
    }
    public function message(){
        return [
            'username.required' => 'Username input was left Null',
            'user_id.required' => 'invalid user id',
        ];   
    }
}

