<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'subject' => 'string|max:255|required',
            'body' => 'string|required'
        ];
    }


    public function messages(): array
    {
        return [
            'subject.string' => 'Поле тема должно содержать строку',
            'body.string' => 'Поле комментарий должно содержать строку',
            'subject.required' => 'Поле тема обязательно',
            'subject.max' => 'Поле тема не может быть длиннее 255 символов',
            'body.required' => 'Поле комментарий обязательно',
        ];
    }
}
