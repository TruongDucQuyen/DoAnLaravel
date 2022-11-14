<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
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
            'ten_dang_nhap'=>'required',
            'password'=>'required|between:8,16',
        ];
    }
    public function messages(){
        return[
            'ten_dang_nhap.required'=>'Vui lòng nhập tên đăng nhập',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.between'=>'Mật khẩu từ :min đến :max ký tự'
        ];
    }
}
