<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Aler;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $dsReport=Report::orderBy('id','DESC')->paginate(10);
        return view('/danh-sach-report',compact('dsReport'));
    }
    public function xlReport(Request $request){
        $report=Report::create([
            'tennguoi_report'=>Auth::user()->ho_ten,
        'baiviet_id'=>$request->baiviet_id,
        'noi_dung_report'=>$request->noi_dung_report,
        'nguoi_report_id'=>Auth::user()->id,
        ]);
        if (!empty($report)) {
            toast('Đã Report Thành Công', 'success');
            return redirect('chi-tiet-bai-dang/'.$request->baiviet_id);
            //return redirect()->route('PostDetail');
        }
        
        return redirect()->route('trang-chu');
    }
    public function destroy($id)
    {
        $report=Report::find($id);
        if(empty($report)){
            return "Không tìm thấy tài khoản với ID={$id}";
        }
        #Xóa
        $report->delete();
        return redirect()->route('danh-sach-report');
    }
    public function detail($id){
        $dsReport=Report::find($id);
        return view('chi-tiet-report',compact('dsReport'));
    }
}
