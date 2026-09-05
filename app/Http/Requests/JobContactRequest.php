<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class JobContactRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'prefectures_id' => 'required|string|max:2',
            'status' => 'required|string|max:2',
            'wage_type' => 'required|string|max:2',
            'salary_amount' => 'required|string|max:8',
            'img' => 'image|mimes:jpg,jpeg,png|max:2048',
            'age' => 'required|string|max:2',
            'license' => 'required|string|max:2',
            'experience' => 'required|string|max:2',
            'company_name' => 'required|string|max:255',
            'company_tel' => 'required|string|max:20',
            // 'company_email' => 'required|string|email|max:255|unique:jobs,email,' . Auth::id(),
            'company_email' => 'required|string|email|max:255|'
        ];
    }

    public function messages()
    {
        return [
            'img.image' => '指定されたファイルが画像ではありません',
            'img.mimes' => '指定された拡張子(jpg/jpeg/png)ではありません',
            'img.max' => 'ファイルサイズは2MB以内にしてください',
        ];
    }
}
