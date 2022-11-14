<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập vào website</title>
    <link rel="stylesheet" href="/login/login.css">
</head>
<body>
    <main>
        <style>
            .dangky{
                text-align:center;
            }
            .alert{
                color:red;
                padding-left:3px;
                padding-top:3px;
                font-size: 12px;
            }
        </style>
        <div class="container">
        <div class="login-form">
            <form action="{{ route('xl-dang-nhap')}}" method="post">
                @csrf
                <h1>Đăng nhập</h1>
                <div class="input-box">
                    <i ></i>
                    <input type="text" placeholder="Nhập username" id="username" name="ten_dang_nhap" class="@error('ten_dang_nhap') is-invalid @enderror">
                    @error('ten_dang_nhap')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <i ></i>
                    <input type="password" placeholder="Nhập mật khẩu" id="pass" name="password" class="@error('password') is-invalid @enderror">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="btn-box">
                    <button id="#btn1" type="submit" >
                        Đăng nhập
                    </button>
                </div>
                <div class="dangky">
                    Chưa có tài khoản
                    <a href="{{route('dang-ky')}}">Đăng ký ngay!!</a>
                </div>
            </form>
            @if(session('error'))
            <p>{{session('error')}}</p>
            @endif
        </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/login/login.js"></script>
</body>
</html>