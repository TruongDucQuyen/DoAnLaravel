<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiDang;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;

class BinhLuanController extends Controller
{
    public function detail(BaiDang $id){
        $detail=BaiDang::find($id);
        $listbinhLuan=BinhLuan::all()->sortByDesc('created_at');
        return view('chi-tiet-bai-dang',compact(['detail','listbinhLuan']));
    }
    public function store(Request $request)
    {
        $binhLuan=BinhLuan::create([
            'ho_ten'=>(Auth::user()->ho_ten),
            'noi_dung'=>$request->noi_dung,
            'user_id'=>(Auth::user()->id),
            'baidang_id'=>$request->baidang_id,
            'parent_id'=>$request->parent_id,
            'avatar'=>(Auth::user()->image),
        ]);
        if(!empty($binhLuan)){
            #quay về trang danh sách tin tức
            //return view('home-login',compact('lsBaiDang'));
            return redirect('chi-tiet-bai-dang/'.$request->baidang_id);
        }
        #Thông báo thêm không thành công
        return redirect()->route('trang-chu');
    }
}
