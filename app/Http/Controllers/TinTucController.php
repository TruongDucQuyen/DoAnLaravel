<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Aler;

class TinTucController extends Controller
{
    public function index(){
        $dsTinTuc=TinTuc::orderBy('id','DESC')->paginate(6);
        return view(('tin-tuc'),compact('dsTinTuc'));
    }
    public function dsTinTuc()
    {
        $dsTinTuc=TinTuc::orderBy('id','DESC')->paginate(10);
        return view('danh-sach-tin-tuc-admin',compact('dsTinTuc'));
    }
    public function create()
    {
        return view('dang-tin-tuc-admin');
    }
    public function store(Request $request)
    {
        $tinTuc=TinTuc::create([
            'tieu_de'=>$request->tieu_de,
            'noi_dung'=>$request->noi_dung,
            'ten_nguoi_dang'=>(Auth::user()->ho_ten),
            'nguoidang_id'=>(Auth::user()->id),
            'thoi_gian'=>Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
            'hinh_anh' => $request->file('image')->getClientOriginalName(),
            'path' => $request->file('image')->store('public/tintucimages'),
            $file = $request->image,
            $file_name = $file->getClientOriginalName(),
            $file->move(public_path('tintucimages'), $file_name),
            $request->merge(['image' => $file_name]),
        ]);
        if(!empty($tinTuc)){
            toast('Đăng tin tức thành công','success');
            #quay về trang danh sách tin tức
            //return view('home-login',compact('lsBaiDang'));
            return redirect()->route('danh-sach-tin-tuc-admin');
        }
        #Thông báo thêm không thành công
        return redirect()->route('danh-sach-tin-tuc-admin');
    }
    public function xoaTinTuc($id)
    {
        $tinTuc=TinTuc::find($id);
        if(empty($tinTuc)){
            return "Không tìm thấy bài đăng với ID={$id}";
        }
        #Xóa
        $tinTuc->delete();
        return redirect()->route('danh-sach-tin-tuc-admin');
    }
    public function detail(TinTuc $id){
        $detail=TinTuc::find($id);
        return view('chi-tiet-tin-tuc',compact('detail'));
    }
    public function detail1(TinTuc $id){
        $dsTinTuc=TinTuc::orderBy('id','DESC')->paginate(6);
        $detail=TinTuc::find($id);
        return view('chi-tiet-tin-tuc1',compact(['detail','dsTinTuc']));
    }
}
