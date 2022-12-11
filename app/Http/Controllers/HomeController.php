<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\BaiDang;
use App\Models\TinTuc;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\DangKyRequest;
use RealRashid\SweetAlert\Facades\Aler;
use Illuminate\Support\Facades\DB;

/*Alert::alert('Title', 'Message', 'Type');
Alert::success('Success Title', 'Success Message');
Alert::info('Info Title', 'Info Message');
Alert::warning('Warning Title', 'Warning Message');
Alert::error('Error Title', 'Error Message');
Alert::question('Question Title', 'Question Message');
Alert::html('Html Title', 'Html Code', 'Type');
Alert::toast('Toast Message', 'Toast Type', 'Toast Position');*/

class HomeController extends Controller
{
    public function index(){
        //$lsBaiDang=BaiDang::paginate(4);
        //$lsBaiDang->sortByDesc('id');
        $lsTinTuc=TinTuc::orderBy('id','DESC')->paginate(4);
        $lsBaiDang=BaiDang::orderBy('id','DESC')->where('trang_thai','=',1)->paginate(4);
        return view('trang-chu',compact(['lsBaiDang','lsTinTuc']));
    }
    public function tinNhatDo(){
        //$lsBaiDang=BaiDang::paginate(4);
        //$lsBaiDang->sortByDesc('id');
        $lsTinTuc=TinTuc::orderBy('id','DESC')->paginate(4);
        $lsBaiDang=BaiDang::orderBy('id','DESC')->where('trang_thai','=',1)->where('loai_tin','=',1)->paginate(6);
        return view('tin-nhat-do',compact(['lsBaiDang','lsTinTuc']));
    }
    public function tinMatDo(){
        //$lsBaiDang=BaiDang::paginate(4);
        //$lsBaiDang->sortByDesc('id');
        $lsTinTuc=TinTuc::orderBy('id','DESC')->paginate(4);
        $lsBaiDang=BaiDang::orderBy('id','DESC')->where('trang_thai','=',1)->where('loai_tin','=',0)->paginate(6);
        return view('tin-mat-do',compact(['lsBaiDang','lsTinTuc']));
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
        toast('Tên tài khoản hoặc mật khẩu không đúng','error');
        return redirect()->back();

    }
    public function dangKy(){
        return view('dang-ky');
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
            'userType'=>'URS',
            'email'=>$request->email,
            'image' => $request->file('image')->getClientOriginalName(),
            'path' => $request->file('image')->store('public/avatars'),
            $file = $request->image,
            $file_name = $file->getClientOriginalName(),
            $file->move(public_path('avatars'), $file_name),
            $request->merge(['image' => $file_name]),
        ]);
        if(!empty($taiKhoan)){
            alert()->success('Đăng Ký Tài Khoản', 'Thành Công');
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
    public function edit(){
        $lsBaiDang=BaiDang::orderBy('id','DESC')->paginate(4);
        return view('thong-tin-ca-nhan',compact('lsBaiDang'));
    }
    public function chinhSuaThongTin(User $user){
        $profile=$user::find(Auth::user()->id);
        return view('edit-profile',compact('profile'));
    }
    public function update(Request $request){
        $profile=User::find(Auth::user()->id);
        if(empty($profile)){
            return("Khong tim thay id nguoi dung voi id = {$id}");
        }
        //$profile->ten_dang_nhap=$request->ten_dang_nhap;
        $profile->ho_ten=$request->ho_ten;
        $profile->email=$request->email;
        $profile->address=$request->address;
        $profile->phone=$request->phone;
        //$profile->hinh_anh=$request->hinh_anh;
        $profile->save();
        alert()->success('Chỉnh Sửa Tài Khoản', 'Thành Công');
        return redirect()->route('profile');
    }
    public function search(Request $request){
        $lsTinTuc=TinTuc::orderBy('id','DESC')->paginate(4);
        $search=$request->search;
        $dsSearch=BaiDang::orderBy('id','DESC')->where('tieu_de','like','%'.$request->search.'%')->orWhere('noi_dung','like','%'.$request->search.'%')->paginate(6);
        return view('/search',compact(['dsSearch','lsTinTuc','search']));
    }
    public function lienHe(){
        return view('/lien-he');
    }
}
