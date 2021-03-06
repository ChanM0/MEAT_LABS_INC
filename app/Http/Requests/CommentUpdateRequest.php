<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateRequest extends FormRequest
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
            'comment' => 'required|string|',
            'comment_id' => 'required',
        ];
    }
    public function message(){
        return [
            'comment.required' => 'Comment input was left Null',
            'comment_id.required' => 'invalid comment id',
        ];   
    }
}
