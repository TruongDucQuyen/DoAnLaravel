<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\BaiDang;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\DangKyRequest;


class HomeController extends Controller
{
    public function index(){
        $lsBaiDang=BaiDang::all()->sortByDesc('id');
        return view('trang-chu',compact('lsBaiDang'));
    }
    public function dangNhap(){
        return view('dang-nhap');
    }
    public function xuLyDangNhap(DangNhapRequest $request)
    {
        $lsBaiDang=BaiDang::all()->sortByDesc('id');
        $credentials =[
            'ten_dang_nhap' => $request ->ten_dang_nhap,
            'password' => $request ->password,
            ];
        if(Auth::attempt($credentials)&&(Auth::user()->userType=='URS')){
            //return view('trang-chu',compact('lsBaiDang'));
            return redirect()->route('trang-chu');
        }
        else if(Auth::attempt($credentials)&&(Auth::user()->userType=='ADM')){
            return redirect()->route('AdminHome');
            //return view('AdminHome');
        }
        return redirect()->back()->with("error","Đăng nhập không thành công!");

    }
    public function dangKy(){
        return view('dang-ky');
    }
    public function xuLyDangKy(DangKyRequest $request)
    {
        $taiKhoan=User::create([
            'ten_dang_nhap'=>$request->ten_dang_nhap,
            'mat_khau'=>Hash::make($request->mat_khau),
            'ho_ten'=>$request->ho_ten,
            'userType'=>'URS',
            'email'=>$request->email,
        ]);
        if(!empty($taiKhoan)){
            #quay về trang danh sách tin tức
            return redirect()->route('dang-nhap');
        }
        #Thông báo thêm không thành công
        return "Thêm mới tài khoản không thành công";
    }
    public function dangXuat(){
       Auth::logout();
       return redirect()->route('trang-chu');
    }
    public function profile(){
        $lsBaiDang=BaiDang::paginate(4);
        //$lsBaiDang->sortByDesc('id');
        return view('thong-tin-ca-nhan',compact('lsBaiDang'));
    }
}
