<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaiDang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="bai_dang";
    protected $fillable=[
        'tieu_de',
        'loai_tin',
        'noi_dung',
        'noi_mat',
        'thong_tin_lien_he',
        'user_id',
        'trang_thai',
        'avatar_author',
        'ten_nguoi_dang',
        'thoi_gian',
        'hinh_anh',
        'path'
    ];
}
