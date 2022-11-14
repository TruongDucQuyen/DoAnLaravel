@extends('layout')
@section('content')
<style>
    .baidang{
       padding-left:570px;
       padding-top:30px
    }
</style>
    <h1 style="text-align:center">Thông Tin Bài Đăng</h1>
    <div class="baidang">
        <form action="" method="GET">
        @csrf
            <div class="form-group">
                <h5>Tiêu đề : </h5>
            </div>
        </form>
    </div>
@endsection