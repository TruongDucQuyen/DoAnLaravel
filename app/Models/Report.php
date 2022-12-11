<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='report';
    protected $fillable=[
        'tennguoi_report',
        'baiviet_id',
        'noi_dung_report',
        'nguoi_report_id'
    ];
}
