<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TinTuc extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "tin_tuc";
    protected $fillable = [
        'id',
        'tieu_de',
        'noi_dung',
        'ten_nguoi_dang',
        'nguoidang_id',
        'thoi_gian',
        'hinh_anh',
        'path'
    ];
}
