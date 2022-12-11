<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinhLuan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="binh_luan";
    protected $fillable=[
        'ho_ten',
        'noi_dung',
        'user_id',
        'baidang_id',
        'parent_id',
        'avatar'
    ];
}
