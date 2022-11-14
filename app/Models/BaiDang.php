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
        'thoi_gian'
        //'anh',
        //'path'
    ];
}
