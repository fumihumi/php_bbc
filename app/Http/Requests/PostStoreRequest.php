<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules() {
        return [
            'title' => 'required',
            'content' => 'required',
            'cat_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'タイトルを正しく入力してください。',
            'content.required' => '本文を正しく入力してください。',
            'cat_id.required' => 'カテゴリーを選択してください。',
        ];
    }


}
