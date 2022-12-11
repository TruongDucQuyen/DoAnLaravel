<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        toast('Lỗi','error');
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
            'ho_ten'=>'required',
            'ten_dang_nhap'=>'bail|required|min:6',
            'mat_khau'=>'bail|required|between:8,16',
            'confirm_mat_khau'=>'bail|required|same:mat_khau',
            'email'=>'bail|required|email',
        ];
    }
    public function messages(){
        return[
            'ho_ten.required'=>'Vui lòng nhập họ tên',
            'ten_dang_nhap.required'=>'Vui lòng nhập tên đăng nhập',
            'ten_dang_nhap.min'=>'Tên đăng nhập có độ dài ít nhất 6 ký tự',
            'mat_khau.required'=>'Vui lòng nhập mật khẩu',
            'mat_khau.between'=>'Mật khẩu có độ dài từ :min đến :max ký tự',
            'confirm_mat_khau.required'=>'Vui lòng xác nhận mật khẩu',
            'confirm_mat_khau.same'=>'Xác nhận mật khẩu không khớp',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Vui lòng nhập email đúng định dạng',
        ];
    }
}
