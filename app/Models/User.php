<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table="User";
    protected $fillable=[
        'ten_dang_nhap',
        'mat_khau',
        'ho_ten',
        'email',
        'userType'
    ];
    public function getPasswordAttribute(){
        return $this->mat_khau;
    }
}
