<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // true に設定して、全ユーザーがリクエストを送信できるようにする
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // バリデーションルール
        return [
            'title' => 'required|string|max:255',
            'detail' => 'nullable|max:1000',
        ];
    }

    public function messages()
    {
        // エラーメッセージ
        return [
            'title.required' => 'タイトルは必須項目です。',
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'detail.max' => '詳細は1000文字以内で入力してください。',
        ];
    }
}
