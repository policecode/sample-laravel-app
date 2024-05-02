<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:categories,name'],
            'slug' => ['required', 'string', 'unique:categories,slug'],
            'description' => '',
            'parent' => '',
            'group' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute bắt buộc phải nhập',
            'string' => 'Trường :attribute phải là chuôi',
            'unique' => 'Dữ liệu đã tồn tại'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên trường',
            'slug' => 'Đường dẫn động'
        ];
    }
}
