<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string|max:20',
            'age' => 'required|string|max:2',
            'gender' => 'required|string|max:2',
            'email' => 'required|string|email|max:255|unique:users',
            'prefectures_id' => 'required|string|max:2',
            'municipalities' => 'required|string|max:255',
            'current_job' => 'required|string|max:2',
            'password' => 'required|string|confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'age.required' => '年齢は必ず選択してください',
            'gender.required' => '性別必ず選択してください',
            'prefectures_id.required' => '住所は必ず選択してください',
            'current_job.required' => '現在のご職業は必ず選択してください',
        ];
    }
}
