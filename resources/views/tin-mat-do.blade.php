<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tìm Đồ Thất Lạc</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="/profile/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
</head>

<body>
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
                    <div class="nav-item active dropdown">
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
                    <!--<li class="nav-item">
                        <a class="nav-link text-body small" href="{{route('dang-xuat')}}">Thoát</a>
                    </li> -->
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
                        <a href="#" class="nav-link active dropdown-toggle" data-toggle="dropdown">Danh Mục</a>
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


    <!-- Main News Slider Start -->

    <!-- -->
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Tin Mất Đồ</h4>
                            </div>
                        </div>
                        @foreach($lsBaiDang as $data)
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="images/{{$data->hinh_anh}}"
                                    style="object-fit: cover; height: 250px;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <small>{{$data->created_at->format('d/m/Y')}}</small>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                        href="/chi-tiet-bai-dang/{{$data->id}}">{{$data->tieu_de}}</a>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex">
                                        <small>Người đăng : {{$data->ten_nguoi_dang}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <style>
                        .pagination {
                            margin-left: 160px
                        }
                        </style>
                        <div class="pagination">
                            {{$lsBaiDang->links('vendor\pagination\bootstrap-4')}}
                        </div>
                    </div>
                </div>
                <!-- Right -->
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
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
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
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet
                        elit. Proin vitae porta diam...</a>
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                            href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet
                        elit. Proin vitae porta diam...</a>
                </div>
                <div class="">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                            href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet
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
                        <a href=""><img class="w-100" src="/template/img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="/template/img/news-110x110-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="/template/img/news-110x110-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="/template/img/news-110x110-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="/template/img/news-110x110-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="/template/img/news-110x110-1.jpg" alt=""></a>
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