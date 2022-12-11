<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiDang;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\BinhLuan;
use App\Models\TinTuc;
use RealRashid\SweetAlert\Facades\Aler;

class BaiDangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dang-bai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dang-bai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lsBaiDang=BaiDang::all();
        $baiDang=BaiDang::create([
            'tieu_de'=>$request->tieu_de,
            'loai_tin'=>$request->loai_tin,
            'noi_dung'=>$request->noi_dung,
            'noi_mat'=>$request->noi_mat,
            'trang_thai'=>0,
            'thong_tin_lien_he'=>$request->thong_tin_lien_he,
            'ten_nguoi_dang'=>(Auth::user()->ho_ten),
            'user_id'=>(Auth::user()->id),
            'avatar_author'=>(Auth::user()->image),
            'thoi_gian'=>Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
            'hinh_anh' => $request->file('image')->getClientOriginalName(),
            'path' => $request->file('image')->store('public/images'),
            $file = $request->image,
            $file_name = $file->getClientOriginalName(),
            $file->move(public_path('images'), $file_name),
            $request->merge(['image' => $file_name]),
        ]);
        if(!empty($baiDang)){
            alert()->success('Đăng Bài Thành Công', 'Bài Đăng Của Bạn Sẽ Được Xét Duyệt Trong Vòng 24H');
            #quay về trang danh sách tin tức
            //return view('home-login',compact('lsBaiDang'));
            return redirect()->route('trang-chu');
        }
        #Thông báo thêm không thành công
        return redirect()->route('trang-chu');
    }

    public function detail(BaiDang $id){
        $lsTinTuc=TinTuc::orderBy('id','DESC')->paginate(4);
        $detail=BaiDang::find($id);
        $listbinhLuan=BinhLuan::all();
        return view('chi-tiet-bai-dang',compact(['detail','listbinhLuan','lsTinTuc']));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$baiDang=BaiDang::find($id);
        return view('chi-tiet-bai-dang',compact('baiDang'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $baiDang=BaiDang::find($id);
        return view('chinh-sua-bai-dang',compact('baiDang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $baiDang=BaiDang::find($id);
        if(empty($baiDang)){
            return "Không tìm thấy bài đăng với ID={$id}";
        }
        #Cập nhật
        $baiDang->tieu_de=$request->tieu_de;
        $baiDang->loai_tin=$request->loai_tin;
        $baiDang->noi_dung=$request->noi_dung;
        $baiDang->noi_mat=$request->noi_mat;
        $baiDang->thong_tin_lien_he=$request->thong_tin_lien_he;
        $baiDang->hinh_anh=$request->file('image')->getClientOriginalName();
        $baiDang->path=$request->file('image')->store('public/images');
        $baiDang->created_at=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $file = $request->image;
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('images'), $file_name);
        $request->merge(['image' => $file_name]);
        $baiDang->save();
        toast('Chỉnh Sửa Bài Viết Thành Công','success');
        return redirect()->route('chi-tiet-bai-dang',['id'=>$baiDang->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baiDang=BaiDang::find($id);
        if(empty($baiDang)){
            return "Không tìm thấy bài đăng với ID={$id}";
        }
        #Xóa
        $baiDang->delete();
        return redirect()->route('trang-chu');
    }
    public function detailAdmin(BaiDang $id){
        $detail=BaiDang::find($id);
        return view('chi-tiet-bai-dang-admin',compact('detail'));
    }
}