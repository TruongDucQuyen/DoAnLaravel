<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKyRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\BaiDang;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('AdminHome');
        //return view('danh-sach-admin');
    }
    public function dangKy(){
        return view('signup');
    }
    public function xuLyDangKy(DangKyRequest $request)
    {
        $taiKhoan=User::create([
            'ten_dang_nhap'=>$request->ten_dang_nhap,
            'mat_khau'=>Hash::make($request->mat_khau),
            'ho_ten'=>$request->ho_ten,
            'userType'=>'ADM',
            'email'=>$request->email,
        ]);
        if(!empty($taiKhoan)){
            #quay về trang danh sách tin tức
            return redirect()->route('AdminHome');
        }
        #Thông báo thêm không thành công
        return "Thêm mới tài khoản không thành công";
    }
    public function dsAdmin(){
        $dsAdmin=User::all();
        //$dsAdmin=DB::table('User')->where('userType','=','ADM')->get();
        return view('danh-sach-admin',compact('dsAdmin'));
    }
    public function edit($id)
    {
        $adMin=User::find($id);
        return view('cap-nhat-admin',compact('adMin'));
    }
    public function update(Request $request, $id)
    {
        $adMin=User::find($id);
        if(empty($adMin)){
            return "Không tìm thấy tài khoản với ID={$id}";
        }
        #Cập nhật
        $adMin->ten_dang_nhap=$request->ten_dang_nhap;
        $adMin->ho_ten=$request->ho_ten;
        $adMin->email=$request->email;
        $adMin->address=$request->address;
        $adMin->phone=$request->phone;
        $adMin->save();
        return redirect()->route('danh-sach-admin');
    }
    public function destroy($id)
    {
        $adMin=User::find($id);
        if(empty($adMin)){
            return "Không tìm thấy tài khoản với ID={$id}";
        }
        #Xóa
        $adMin->delete();
        return redirect()->route('danh-sach-admin');
    }
    public function dsBaiDang(){
        $dsBaidang=BaiDang::all();
        return view('danh-sach-bai-viet-admin',compact('dsBaidang'));
    }
    public function xoaBaiDang($id)
    {
        $baiDang=BaiDang::find($id);
        if(empty($baiDang)){
            return "Không tìm thấy bài đăng với ID={$id}";
        }
        #Xóa
        $baiDang->delete();
        return redirect()->route('danh-sach-bai-viet-admin');
    }
}
