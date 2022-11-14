<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="/signup/signup.css">
</head>
<body>
    <main>
    <style>
            .alert{
                color:red;
                padding-left:3px;
                padding-top:3px;
                font-size: 12px;
            }
        </style>
        <div>
            <div class="register-form">
                <form action="{{ route('xl-dang-ky')}}" method="post">
                @csrf
                    <h1>Đăng ký tài khoản mới</h1>
                    <div class="input-box">

                        <input type="text" placeholder="Họ tên" name="ho_ten"class="@error('ho_ten') is-invalid @enderror">
                        @error('ho_ten')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="input-box">

                        <input type="text" placeholder="Tên đăng nhập" name="ten_dang_nhap"class="@error('ten_dang_nhap') is-invalid @enderror">
                        @error('ten_dang_nhap')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Mật khẩu" id="pass1" name="mat_khau"class="@error('mat_khau') is-invalid @enderror">
                        @error('mat_khau')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Xác nhận mật khẩu" id="pass1" name="confirm_mat_khau"class="@error('confirm_mat_khau') is-invalid @enderror">
                        @error('confirm_mat_khau')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Email" id="pass1" name="email"class="@error('email') is-invalid @enderror">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="btn-box">
                        <button id="btn" type="submit">
                            Đăng ký
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>