<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tìm Đồ Thất Lạc</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/template/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/template/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
    <script>
    $(document).ready(function() {
        $('.delete').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xoá bài viết này không?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Không',
                confirmButtonText: 'Có',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Đã xoá thành công!',
                    )
                    $.get($(this).attr('href'));
                    window.location.replace('/');
                }
            })
        })
    })
    </script>
    @include('sweetalert::alert')
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <?php 
            try{
                $check=Auth::user()->id;
        ?>
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small"
                                href="{{route('profile')}}">{{Auth::user()->ten_dang_nhap}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="{{route('dang-xuat')}}">Thoát</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <style>
        .row {
            text-align: center;
        }
        </style>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <h1 class="h1">TÌM ĐỒ THẤT LẠC</h1>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="{{route('trang-chu')}}" class="navbar-brand d-block d-lg-none">
                <h1>Tìm đồ thất lạc</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{route('trang-chu')}}" class="nav-item nav-link">Trang Chủ</a>
                    <a href="{{route('dang-bai')}}" class="nav-item nav-link">Đăng Bài</a>
                    <a href="{{route('tin-tuc')}}" class="nav-item nav-link">Tin Tức</a>
                    <div class="nav-item dropdown active">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh Mục</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{route('tin-nhat-do')}}" class="dropdown-item">Tin Nhặt Đồ</a>
                            <a href="{{route('tin-mat-do')}}" class="dropdown-item">Tin Mất Đồ</a>
                        </div>
                    </div>
                    <a href="{{route('lien-he')}}" class="nav-item nav-link">Liên Hệ</a>
                </div>
                <form action="{{route('xl-tim-kiem')}}" method="POST">
                    @csrf
                    <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                        <input type="text" class="form-control border-0" placeholder="Keyword" name="search">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-primary text-dark border-0 px-3"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    <?php 
            }catch(Exception $e){
        ?>
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-3 text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="{{route('dang-nhap')}}">Đăng Nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="{{route('dang-ky')}}">Đăng Ký</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="{{route('dang-xuat')}}">Thoát</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <style>
    .row {
        text-align: center;
    }
    </style>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <h1 class="h1">TÌM ĐỒ THẤT LẠC</h1>
    </div>
    </div>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span
                        class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{route('trang-chu')}}" class="nav-item nav-link">Trang Chủ</a>
                    <a href="{{route('dang-nhap')}}" class="nav-item nav-link">Đăng Bài</a>
                    <a href="{{route('tin-tuc')}}" class="nav-item nav-link">Tin Tức</a>
                    <div class="nav-item dropdown active">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh Mục</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{route('tin-nhat-do')}}" class="dropdown-item">Tin Nhặt Đồ</a>
                            <a href="{{route('tin-mat-do')}}" class="dropdown-item">Tin Mất Đồ</a>
                        </div>
                    </div>
                    <a href="{{route('lien-he')}}" class="nav-item nav-link">Liên Hệ</a>
                </div>
                <form action="{{route('xl-tim-kiem')}}" method="POST">
                    @csrf
                    <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                        <input type="text" class="form-control border-0" placeholder="Keyword" name="search">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-primary text-dark border-0 px-3"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    <?php }?>
    <!-- Navbar End -->


    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="section-title mb-0">
                        <!--Số lượng Comment-->
                        <h4 class="m-0 text-uppercase font-weight-bold">THÔNG TIN BÀI VIẾT</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    @foreach( $detail as $dt)
                    <div class="position-relative mb-3">
                        <!--ảnh và tên người dung-->
                        <div class="d-flex justify-content-between bg-white  p-4">
                            <div class="d-flex align-items-center">
                                <?php if(($dt->avatar_author)!=null){ ?>
                                <img class="rounded-circle mr-2" src="{{asset('avatars/')}}/{{$dt->avatar_author}}"
                                    width="25" height="25" alt="">
                                <?php } else { ?>
                                <img class="rounded-circle mr-2 " width="35" height="35"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <?php }?>
                                <a href=""><span>{{$dt->ten_nguoi_dang}}</span></a>
                            </div>
                            <div class="d-flex align-items-center">
                                <?php 
                                    try{ $check=Auth::user()->id;
                                    if($dt->user_id==Auth::user()->id){
                                ?>
                                <!--số người xem-->
                                <span class="ml-3"><i class="far fa-eye mr-2"></i><a
                                        href="/chinh-sua-bai-dang/{{$dt->id}}" style="color:grey;">Chỉnh sửa</a></span>
                                <!--Số người comment-->
                                <span class="ml-3"><i class="far fa-comment mr-2"></i><a
                                        href="/xoa-bai-dang-user/{{$dt->id}}" style="color:grey;"
                                        class="delete">Xóa</a></span>
                                <?php } else { ?>
                                <!--số người xem-->
                                <span class="ml-3"><i class="far fa-eye mr-2"></i>Theo dõi </span>
                                <!--Report-->
                                <style>
                                .modal {
                                    display: none;
                                    position: fixed;
                                    z-index: 1;
                                    padding-top: 100px;
                                    left: 0;
                                    top: 0;
                                    width: 100%;
                                    height: 100vh;
                                    overflow: auto;
                                    background-color: rgba(0, 0, 0, 0.5);
                                }

                                .modal-content {
                                    background-color: #fefefe;
                                    margin: auto;
                                    padding: 20px;
                                    border: 1px solid #888;
                                    width: 80%;
                                }

                                .close {
                                    color: #aaaaaa;
                                    float: right;
                                    font-size: 28px;
                                    font-weight: bold;
                                    cursor: pointer;
                                }

                                .close:hover,
                                .close:focus {
                                    color: #000;
                                    text-decoration: none;
                                    cursor: pointer;
                                }
                                </style>
                                <script>
                                $(document).ready(function() {
                                    var modal = $('.modal');
                                    var btn = $('.btn');
                                    var span = $('.close');

                                    btn.click(function() {
                                        modal.show();
                                    });

                                    span.click(function() {
                                        modal.hide();
                                    });

                                    $(window).on('click', function(e) {
                                        if ($(e.target).is('.modal')) {
                                            modal.hide();
                                        }
                                    });
                                });
                                </script>
                                <span class="ml-3"><i class="far fa-comment mr-2"></i>
                                    <button class='btn'>Report</button>
                                    <div class="modal">
                                        <div class="modal-content">
                                            <h3>Nội Dung Report <span class="close">&times;</span></h3>
                                            <form action="{{route('xlReport')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="baiviet_id" value="{{$dt->id}}">
                                                <div class="col-md-12"><input type="text" class="form-control"
                                                        placeholder="" name="noi_dung_report">
                                                </div>
                                                <div class="form-group tm-text-right">
                                                    <button type="submit" class="btn btn-success mt-3">Gửi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </span>

                                <!-- End Report -->

                                <?php }} catch(Exception $e) {?>

                                <?php } ?>
                            </div>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <span class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">
                                    {{$dt->tieu_de}}
                                </span>
                                <span class="text-body" href="">{{$dt->created_at->format('d/m/Y')}}</span>
                            </div>
                            <!--tiêu đề-->
                            <div style="text-align:left">
                                <b style="text-align:left"
                                    class="mb-3 text-secondary text-uppercase font-weight-bold">{{$dt->noi_dung}}
                                </b>
                            </div>
                            <img class="img-fluid w-100" src="{{asset('images/')}}/{{$dt->hinh_anh}}"
                                style="object-fit: cover;width:200px;height:600px;">
                        </div>
                        <div class="bg-white border border-top-0 p-3" style="text-align:left">
                            <span class="ml-2">Nơi mất : {{$dt->noi_mat}}</span> <br>
                            <span class="ml-2">Thông tin liên hệ : {{$dt->thong_tin_lien_he}}</span>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <!--Số lượng Comment-->
                            <h4 class="m-0 text-uppercase font-weight-bold">BÌNH LUẬN</h4>
                        </div>

                        <!-- comment -->
                        <?php 
                            if(Auth::check()){
                        ?>
                        @foreach($listbinhLuan as $binhLuan)
                        @if(($binhLuan->baidang_id===$dt->id)&& ($binhLuan->parent_id===null))
                        <div class="media mt-3">
                            <img class="rounded-circle mr-2" src="{{asset('avatars/')}}/{{$binhLuan->avatar}}"
                                width="35" height="35" alt="">
                            <div class="media-body">
                                <style>
                                .card {
                                    border-radius: 1.5em;
                                    width: 700px;
                                }
                                </style>
                                <div class="card">
                                    <style>
                                    .binhluan {
                                        padding-left: 10px;
                                        text-align: left;
                                    }
                                    </style>
                                    <h6 class="mt-2 binhluan"><a class="text-secondary font-weight-bold"
                                            href="">{{$binhLuan->ho_ten}}</a>
                                    </h6>
                                    <style>
                                    .noidung {
                                        padding-left: 10px;
                                        text-align: left;
                                        overflow: hidden;
                                    }
                                    </style>
                                    <label class="noidung">{{$binhLuan->noi_dung}}</label>
                                </div>
                                <style>
                                .phanhoi {
                                    text-align: left;
                                    padding-left: 10px
                                }
                                </style>

                                <!-- Phản hồi bình luận -->
                                <div class="phanhoi">
                                    <button class="border-0" style="font-size:13px"
                                        onclick="myFunction({{$binhLuan->id}})">Phản
                                        hồi</button>
                                    <small><i>{{$binhLuan->created_at->format('d/m/Y')}}</i></small>
                                    <script>
                                    function myFunction(id) {

                                        var x = document.getElementById(id);
                                        if (x.style.display == "none") {
                                            x.style.display = "block";
                                        } else {
                                            x.style.display = "none";
                                        }
                                    }
                                    </script>
                                    <!-- Bình luận con-->
                                    @foreach($listbinhLuan as $binhLuan2)
                                    @if($binhLuan->id===$binhLuan2->parent_id)
                                    <div class="media mt-3" id="{{$binhLuan2->parent_id}}" style="display:none">
                                        <div>
                                            <style>
                                            .card1 {
                                                border-radius: 1.5em;
                                                width: 675px;
                                            }
                                            </style>
                                            <img class="rounded-circle mr-2"
                                                src="{{asset('avatars/')}}/{{$binhLuan->avatar}}" width="35" height="35"
                                                alt="">
                                            <div class="card card1 ml-3">
                                                <style>
                                                .binhluan {
                                                    padding-left: 10px;
                                                    text-align: left;
                                                }
                                                </style>
                                                <h6 class="mt-2 binhluan"><a class="text-secondary font-weight-bold"
                                                        href="">{{$binhLuan2->ho_ten}}</a>
                                                </h6>
                                                <style>
                                                .noidung {
                                                    padding-left: 10px;
                                                    text-align: left;
                                                    overflow: hidden;
                                                }
                                                </style>
                                                <label class="noidung">{{$binhLuan2->noi_dung}}</label>
                                            </div>
                                        </div>
                                        <form method="POST" class="mt-3 rep" style="" id="{{$binhLuan->id}}">
                                            @csrf
                                            <style>
                                            .widthinput1 {
                                                width: 645px;
                                                border-radius: 2em;
                                                height: 50px
                                            }
                                            </style>
                                            <div class="media">
                                                <img class="rounded-circle mr-2"
                                                    src="{{asset('avatars/')}}/{{Auth::user()->image}}" width="35"
                                                    height="35" alt="">
                                                <input type="text" name="noi_dung" class="widthinput1"
                                                    placeholder="Viết bình luận..." value="{{$binhLuan->ho_ten}}">
                                                <input type="hidden" name="parent_id" value="{{$binhLuan->id}}">
                                                <input type="hidden" name="baidang_id" value="{{$dt->id}}">
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success mt-2"
                                                    style="margin-left:620px;border-radius:1em">Đăng</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!-- Tra loi binh luan -->
                                    <form method="POST" class="mt-3 rep" style="display:none" id="{{$binhLuan->id}}">
                                        @csrf
                                        <style>
                                        .widthinput1 {
                                            width: 645px;
                                            border-radius: 2em;
                                            height: 50px
                                        }
                                        </style>
                                        <div class="media">
                                            <img class="rounded-circle mr-2"
                                                src="{{asset('avatars/')}}/{{Auth::user()->image}}" width="35"
                                                height="35" alt="">
                                            <input type="text" name="noi_dung" class="widthinput1"
                                                placeholder="Viết bình luận..." value="{{$binhLuan->ho_ten}}">
                                            <input type="hidden" name="parent_id" value="{{$binhLuan->id}}">
                                            <input type="hidden" name="baidang_id" value="{{$dt->id}}">
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-success mt-2"
                                                style="margin-left:620px;border-radius:1em">Đăng</button>
                                        </div>
                                    </form>
                                    <!-- hết bình luận con-->
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <!-- Binh luan  -->
                        <form method="POST" class="mt-3">
                            @csrf
                            <style>
                            .widthinput {
                                width: 700px;
                                border-radius: 2em;
                                height: 50px
                            }
                            </style>
                            <div class="media">
                                <img class="rounded-circle mr-2" src="{{asset('avatars/')}}/{{Auth::user()->image}}"
                                    width="35" height="35" alt="">
                                <input type="text" name="noi_dung" class="widthinput" placeholder="Viết bình luận...">
                                <input type="hidden" name="baidang_id" value="{{$dt->id}}">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success mt-2"
                                    style="margin-left:670px;border-radius:1em">Đăng</button>
                            </div>
                        </form>
                        <?php } else{?>
                        <h3 class="mt-3"><a href="{{route('dang-nhap')}}">Đăng nhập</a> để bình luận bài viết
                            </h1>
                            <?php }?>
                            @endforeach
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->

                    <!-- Comment Form End -->
                </div>

                <div class="col-lg-4">

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tin Tức Mới Nhất</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            @foreach($lsTinTuc as $dt)
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <div
                                    class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                            href="" disable>{{$dt->ten_nguoi_dang}}</a>
                                        <a class="text-body"
                                            href=""><small>{{$dt->created_at->format('d/m/Y')}}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                        href="/chi-tiet-tin-tuc1/{{$dt->id}}">{{$dt->tieu_de}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Popular News End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA
                </p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                            href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit
                        amet
                        elit. Proin vitae porta diam...</a>
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                            href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit
                        amet
                        elit. Proin vitae porta diam...</a>
                </div>
                <div class="">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                            href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit
                        amet
                        elit. Proin vitae porta diam...</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">
                    <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Entertainment</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Travel</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Lifestyle</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
                <div class="row">
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.

            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Design by <a href="https://htmlcodex.com">HTML Codex</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/template/lib/easing/easing.min.js"></script>
    <script src="/template/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/template/js/main.js"></script>
</body>

</html>