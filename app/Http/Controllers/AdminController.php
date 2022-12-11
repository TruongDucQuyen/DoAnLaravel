<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKyRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\BaiDang;
use App\Models\TinTuc;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Aler;

class AdminController extends Controller
{
    public function index(){
        //$dsBaidang=BaiDang::where('trang_thai','=',0);
        $today=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $baiDang=BaiDang::where('trang_thai','=',1)->where('thoi_gian','=',$today)->count();
        $baiDang1=BaiDang::where('trang_thai','=',1)->get();
        $baiDangChoDuyet=BaiDang::where('trang_thai','=',0)->count();
        $dsBaidang=BaiDang::orderBy('id','DESC')->where('trang_thai','=',0)->get();
        return view('AdminHome',compact('dsBaidang','baiDang','baiDangChoDuyet'));
        //return view('danh-sach-admin');
    }
    public function dangKy(){
        return view('signup');
    }
    public function xuLyDangKy(DangKyRequest $request)
    {
        $usernameExist = User::where('ten_dang_nhap', $request->ten_dang_nhap)->count();
        if ($usernameExist > 0) {
            return redirect()->back()->with(['message' => "Tên tài khoản {$request->ten_dang_nhap} đã tồn tại"]);
        }
        $emailExist = User::where('email', $request->email)->count();
        if ($emailExist > 0) {
            return redirect()->back()->with(['message1' => "Email {$request->email} đã được sử dụng"]);
        }
        $taiKhoan=User::create([
            'ten_dang_nhap'=>$request->ten_dang_nhap,
            'mat_khau'=>Hash::make($request->mat_khau),
            'ho_ten'=>$request->ho_ten,
            'userType'=>'ADM',
            'email'=>$request->email,
            'image' => $request->file('image')->getClientOriginalName(),
            'path' => $request->file('image')->store('public/avatars'),
            $file = $request->image,
            $file_name = $file->getClientOriginalName(),
            $file->move(public_path('avatars'), $file_name),
            $request->merge(['image' => $file_name]),
        ]);
        if(!empty($taiKhoan)){
            toast('Đăng ký tài khoản thành công','success');
            #quay về trang danh sách tin tức
            return redirect()->route('AdminHome');
        }
        #Thông báo thêm không thành công
        return "Thêm mới tài khoản không thành công";
    }
    public function dsAdmin(){
        $dsAdmin=User::where('userType','=','ADM')->paginate(10);
        //$dsAdmin=DB::table('User')->where('userType','=','ADM')->get();
        return view('danh-sach-admin',compact('dsAdmin'));
    }
    public function dsUser(){
        $dsAdmin=User::where('userType','=','URS')->paginate(10);
        //$dsAdmin=DB::table('User')->where('userType','=','ADM')->get();
        return view('danh-sach-user',compact('dsAdmin'));
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
        if(($adMin->userType)==="ADM"){
            toast('Cập nhật thông tin thành công!', 'success');
        return redirect()->route('danh-sach-admin');
        } else {
            toast('Cập nhật thông tin thành công!', 'success');
            return redirect()->route('danh-sach-user');
        }
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
        $dsBaidang=BaiDang::orderBy('id','DESC')->where('trang_thai','=',1)->paginate(10);
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

    public function detailBaiDangChuaXL($id){
        $baiDang=BaiDang::find($id);
        return view('chi-tiet-bai-dang-chua-xl',compact('baiDang'));
    }
    public function duyetBai($id)
    {
        $baiDang=BaiDang::find($id);
        if(empty($baiDang)){
            return "Không tìm thấy tài khoản với ID={$id}";
        }
        #Cập nhật
        $baiDang->trang_thai=1;
        $baiDang->ten_nguoi_duyet=(Auth::user()->ho_ten);
        $baiDang->save();
        toast('Bài Đăng Đã Được Duyệt','success');
        return redirect()->route('AdminHome');
    }
    public function search(Request $request){
        $search=$request->search;
        $dsSearch=BaiDang::orderBy('id','DESC')->where('tieu_de','like','%'.$request->search.'%')->orWhere('noi_dung','like','%'.$request->search.'%')->get();
        $ds2Search=TinTuc::orderBy('id','DESC')->where('tieu_de','like','%'.$request->search.'%')->orWhere('noi_dung','like','%'.$request->search.'%')->get();
        $ds3Search=User::orderBy('id','DESC')->where('ten_dang_nhap','like','%'.$request->search.'%')->orWhere('ho_ten','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->get();
        $ds4Search=Report::orderBy('id','DESC')->where('noi_dung_report','like','%'.$request->search.'%')->orWhere('tennguoi_report','like','%'.$request->search.'%')->get();
        return view('/searchAdmin',compact(['dsSearch','search','ds2Search','ds3Search','ds4Search']));
    }
}