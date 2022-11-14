<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiDang;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            'thong_tin_lien_he'=>$request->thong_tin_lien_he,
            'user_id'=>(Auth::user()->id),
            'thoi_gian'=>Carbon::now(),
            /*'anh' => $request->file('image')->getClientOriginalName(),
            'path' => $request->file('image')->store('public/images'),
            $file = $request->image,
            $file_name = $file->getClientOriginalName(),
            $file->move(public_path('images'), $file_name),
            $request->merge(['image' => $file_name]),*/
        ]);
        if(!empty($baiDang)){
            #quay về trang danh sách tin tức
            //return view('home-login',compact('lsBaiDang'));
            return redirect()->route('home-login');
        }
        #Thông báo thêm không thành công
        return redirect()->route('trang-chu');
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
    public function profile($id){
        $lsBaiDang=BaiDang::find($id);
        return view('chi-tiet-bai-dang',compact('lsBaiDang'));
    }
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
