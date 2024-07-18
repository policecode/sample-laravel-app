<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreCustomerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:150'],
            'gender' => [Rule::in(['male', 'female', 'unknown'])],
            'country' => ['required'],
            'birthday' => ['date'],
            'passport' => ['required', 'unique:customers,passport'],
            'passport_expiration' => '',
            'album' => ''
        ];
    }

    
    public function messages()
    {
        return [
            'required' => 'Trường :attribute bắt buộc phải nhập',
            'string' => 'Trường :attribute phải là chuỗi',
            'in' => ':attribute không đúng giá trị mặc định',
            'unique' => ':attribute đã tồn tại',
            'date' => ':attribute không đúng định dạng',
            'max' => ':attribute không được nhiều hơn :max ký tự',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên người nước ngoài',
            'gender' => 'Giới tính',
            'slug' => 'Đường dẫn động',
            'birthday' => 'Ngày, tháng, năm sinh',
            'passport' => 'Hộ chiếu'
        ];
    }
}
