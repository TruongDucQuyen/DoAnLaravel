<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/admin/css/style.css" rel="stylesheet">
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
</head>

<body>
    <script>
    $(document).ready(function() {
        $('.confirm').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'B???n c?? ch???c ch???n mu???n xo?? b??i vi???t n??y?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Kh??ng',
                confirmButtonText: 'C??',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        '???? xo?? th??nh c??ng!',
                    )
                    $.get($(this).attr('href'));
                    window.location.replace('danh-sach-bai-viet-admin');
                }
            })
        })
    })
    </script>
    @include('sweetalert::alert')
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{route('AdminHome')}}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="avatars/{{Auth::user()->image}}" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{Auth::user()->ho_ten}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('AdminHome')}}" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown active">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Danh s??ch t??i kho???n</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('danh-sach-admin')}}" class="dropdown-item">Admin</a>
                            <a href="{{route('danh-sach-user')}}" class="dropdown-item">Users</a>
                        </div>
                    </div>
                    <a href="{{route('danh-sach-bai-viet-admin')}}" class="nav-item nav-link"><i
                            class="fa fa-th me-2"></i>Danh s??ch b??i vi???t</a>
                    <a href="{{route('danh-sach-tin-tuc-admin')}}" class="nav-item nav-link"><i
                            class="fa fa-keyboard me-2"></i>Danh s??ch tin t???c</a>
                    <a href="{{route('dang-tin-tuc-admin')}}" class="nav-item nav-link"><i
                            class="fa fa-table me-2"></i>????ng tin t???c m???i</a>
                    <a href="{{route('danh-sach-report')}}" class="nav-item nav-link"><i
                            class="fa fa-chart-bar me-2"></i>Report</a>
                    <a href="{{route('dangky')}}" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>????ng
                        k??</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4" action="{{route('xl-tim-kiem-admin')}}" method="POST">
                    @csrf
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search" name="search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">{{Auth::user()->ten_dang_nhap}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="{{route('dang-xuat')}}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Table Start -->
            <div class="container pt-4 px-4">
                <div class="row g-4">
                    <h3>K???t qu??? t??m ki???m : "{{$search}}"</h3>
                    <div class="">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Danh s??ch b??i ????ng</h6>
                            <table class="table">
                                <thead>
                                    <tr style="text-align:center">
                                        <th scope="col">#</th>
                                        <th scope="col">Id ng?????i ????ng</th>
                                        <th scope="col">T??n ng?????i ????ng</th>
                                        <th scope="col">Lo???i tin</th>
                                        <th scope="col">Th???i gian ????ng b??i</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dsSearch as $baiDang)
                                    <tr style="text-align:center">
                                        <th scope="row">{{$baiDang->id}}</th>
                                        <td>{{$baiDang->user_id}}</td>
                                        <td>{{$baiDang->ten_nguoi_dang}}</td>
                                        <td>
                                            <?php 
                                                if($baiDang->loai_tin==0){
                                                    echo('M???t ?????');
                                                }
                                                else{
                                                    echo('Nh???t ?????');
                                                }
                                            ?>
                                        </td>
                                        <td>{{$baiDang->thoi_gian}}</td>
                                        <td><button class="btn btn-success"><a href="/chi-tiet-bai-dang-admin/{{$baiDang->id}}" style="color:white">Chi
                                                    Ti???t</a></button>|
                                            <button type="button" class="btn btn-danger order">
                                                <a href="{{route('baidang.xoa',['id'=>$baiDang->id])}}" class="confirm"
                                                    style="color:white">X??a</a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Danh s??ch t??i kho???n</h6>
                            <table class="table">
                                <thead>
                                    <tr style="text-align:center">
                                        <th scope="col">#</th>
                                        <th scope="col">T??n ????ng nh???p</th>
                                        <th scope="col">H??? t??n</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">?????a ch???</th>
                                        <th scope="col">??i???n tho???i</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ds3Search as $adMin)
                                    <tr style="text-align:center">
                                        <th scope="row">{{$adMin->id}}</th>
                                        <td>{{$adMin->ten_dang_nhap}}</td>
                                        <td>{{$adMin->ho_ten}}</td>
                                        <td>{{$adMin->email}}</td>
                                        <td>{{$adMin->address}}</td>
                                        <td>{{$adMin->phone}}</td>
                                        <td>
                                            <button type="button" class="btn btn-info order"><a style="color:white"
                                                    href="{{route('admin.cap-nhat',['id'=>$adMin->id])}}">Ch???nh
                                                    S???a</a></button>| <button type="button"
                                                class="btn btn-danger order"><a
                                                    href="{{route('admin.xoa',['id'=>$adMin->id])}}" style="color:white"
                                                    class="delete">X??a</a> </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Danh s??ch tin t???c
                            </h6>
                            <table class="table">
                                <thead>
                                    <tr style="text-align:center">
                                        <th scope="col">#</th>
                                        <th scope="col">Id ng?????i ????ng</th>
                                        <th scope="col">T??n ng?????i ????ng</th>
                                        <th scope="col">Ti??u ?????</th>
                                        <th scope="col">N???i dung</th>
                                        <th scope="col">Th???i gian ????ng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ds2Search as $tinTuc)
                                    <tr style="text-align:center">
                                        <th scope="row">{{$tinTuc->id}}</th>
                                        <td>{{$tinTuc->nguoidang_id}}</td>
                                        <td>{{$tinTuc->ten_nguoi_dang}}</td>
                                        <td>{{$tinTuc->tieu_de}}</td>
                                        <td>
                                            <button class="btn btn-success">
                                                <a href="/chi-tiet-tin-tuc/{{$tinTuc->id}}" style="color:white">Chi Ti???t</a>
                                            </button>
                                        </td>
                                        <td>{{$tinTuc->thoi_gian}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger order">
                                                <a href="{{route('tintuc.xoa',['id'=>$tinTuc->id])}}" class="confirm"
                                                    style="color:white">X??a</a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Danh s??ch Report</h6>
                            <table class="table">
                                <thead>
                                    <tr style="text-align:center">
                                        <th scope="col">#</th>
                                        <th scope="col">ID Ng?????i Report</th>
                                        <th scope="col">T??n ng?????i Report</th>
                                        <th scope="col">ID B??i Vi???t</th>
                                        <th scope="col">N???i Dung Report</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ds4Search as $rp)
                                    <tr style="text-align:center">
                                        <th scope="row">{{$rp->id}}</th>
                                        <td>{{$rp->nguoi_report_id}}</td>
                                        <td>{{$rp->tennguoi_report}}</td>
                                        <td>{{$rp->baiviet_id}}</td>
                                        <td>
                                            <button class="btn btn-success">
                                                <a href="{{route('chi-tiet-report',['id'=>$rp->id])}}" style="color:white">Chi Ti???t</a>
                                            </button>
                                        </td>
                                        <td> <button type="button" class="btn btn-danger order"><a
                                                    href="{{route('xoa-report',['id'=>$rp->id])}}" style="color:white"
                                                    class="delete">X??a</a> </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4 ">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author???s credit link/attribution link/backlink. If you'd like to use the template without the footer author???s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/lib/chart/chart.min.js"></script>
    <script src="/admin/lib/easing/easing.min.js"></script>
    <script src="/admin/lib/waypoints/waypoints.min.js"></script>
    <script src="/admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="/admin/js/main.js"></script>
</body>

</html>