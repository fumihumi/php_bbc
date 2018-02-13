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
            'msg' => 'required',
        ];
    }

    public function messages() {
        return [
            'msg.required' => 'Messageを正しく入力してください。',
        ];
    }


}
