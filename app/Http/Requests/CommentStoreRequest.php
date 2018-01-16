<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
            'commenter' => 'required',
            'comment' => 'required'
        ];
    }

    public function messages() {
        return [
            'commenter.required' => '名前を正しく入力してください。。',
            'comment.required' => 'コメントを正しく入力してください。',
        ];
    }
}
