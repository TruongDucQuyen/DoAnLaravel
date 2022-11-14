<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AddAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "ten_dang_nhap"=>"admin01",
            "mat_khau"=>Hash::make("123456789"),
            "ho_ten"=>"Trương Đức Quyền",
            "email"=>"0306201374@caothang.edu.vn"
        ]);
    }
}
