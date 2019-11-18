<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="dashboard/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Quản Lý Nhân Khẩu
  </title>
  <base href="{{asset('')}}">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- CSS Files -->
  <link href="dashboard/css/bootstrap.min.css" rel="stylesheet" />
  <link href="dashboard/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <link href="dashboard/css/style.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="dashboard/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="dashboard/img/logo-small.png">
          </div>
        </a>
        <span class="simple-text logo-normal">
          @can('ql-xaphuong')
            Cấp Xã Phường
          @endcan
          @can('ql-thonxom')
            Cấp Thôn Xóm
          @endcan
          @can('admin')
            Admin
          @endcan
          <!-- <div class="logo-image-big">
            <img src="dashboard/img/logo-big.png">
          </div> -->
        </span>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          @can('ql-xaphuong')
            <li class=" ">
              <a href="admin/hokhau">
                <i class="nc-icon nc-bank"></i>
                <p>Quản lý hộ khẩu</p>
              </a>
            </li>
            <li>
              <a href="admin/yeucau">
                <i class="nc-icon nc-bell-55"></i>
                <p>Quản lý yêu cầu</p>
              </a>
            </li>
            <li>
              <a href="admin/thongke">
                <i class="fa fa-calendar"></i>
                <p>Thống kê</p>
              </a>
            </li>
          @endcan

          @can('ql-thonxom')
            <li>
              <a href="admin/nhankhau">
                <i class="nc-icon nc-diamond"></i>
                <p>Quản lý nhân khẩu</p>
              </a>
            </li>
            <li>
              <a href="admin/yeucau/nhankhau">
                <i class="nc-icon nc-bell-55"></i>
                <p>Quản lý yêu cầu</p>
              </a>
            </li>
          @endcan

          @can('admin')
            <li>
              <a href="admin/user">
                <i class="nc-icon nc-pin-3"></i>
                <p>Quản lý người dùng</p>
              </a>
            </li>
          @endcan  
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <span class="navbar-brand">Hệ thống QL nhân khẩu (Hoài Đức - Hà Nội)</span>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="admin/editaccount">Sửa thông tin tài khoản</a>
                  <a class="dropdown-item" href="admin/dangxuat">Đăng xuất</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
        @yield('content')

        <footer class="footer">
          <div class="container-fluid">
              <div class="clearfix">
                  <div class="panel column3">
                      <h5 style="font-size: 15px;font-weight: bold" class="title">
                          <span>Liên hệ</span>
                      </h5>
                      <div class="contact">
                          <ul class="list-contact">
                              <li>
                                  <span><i class="fa fa-phone"></i>  Điện thoại: </span>
                                  <span style="font-weight:bold">0967383831</span>
                              </li >
                              <li>
                                  <span><i class="fa fa-envelope"></i> Email: </span>
                                  <span style="font-weight:bold">phucktpm1@gmail.com</span>
                              </li>
                              <li>
                                  <span><i class="fa fa-globe"></i> Website: </span>
                                  <a href="" title="Website">https://nhankhau.com</a>
                              </li>						
                          </ul>
                      </div>
                  </div>
                  <div class="copyright pull-right">
                      <div class="group">
                          &copy; <script>document.write(new Date().getFullYear())</script>, Thực hiện  bởi Nhóm 24 <i style="color:red" class="fa fa-heart heart"></i>
                      </div>
                      <div class="clearfix name">
                          <span>Nguyễn Huy Phúc</span>
                          <span>Trần Thị Ánh Ngọc</span>
                          <span>Hồ Ngọc Duẩn</span>
                      </div>
                  </div>
              </div>
              
          </div>
        </footer>
      
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="dashboard/js/core/jquery.min.js"></script>
  <script src="dashboard/js/core/popper.min.js"></script>
  <script src="dashboard/js/core/bootstrap.min.js"></script>
  <script src="dashboard/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="dashboard/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="dashboard/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="dashboard/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="dashboard/demo/demo.js"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>

  <script src="dashboard/js/script.js"></script>
  @yield('scripts')
</body>


</html>
