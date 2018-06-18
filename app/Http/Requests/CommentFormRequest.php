<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
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
            //
            'firstName' => 'required|string|',
            'lastName' => 'required|string|',
            'email' => 'required|email',
            'password' => 'required|string|min:5',
            'username' => 'required|string|'
        ];
    }
    public function message(){
        return [
            'firstName.required' => 'Well it looks like you forgot a First Name',
            'lastName.required' => 'Well it looks like you forgot a Last Name',
            'email.required' => 'Well it looks like you forgot a Email',
            'password.required' => 'Well it looks like you forgot a password',
            'username.required' => 'Well it looks like you forgot a username',
        ];   
    }
}
