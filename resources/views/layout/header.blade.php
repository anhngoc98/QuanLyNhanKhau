<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand clearfix" href="trangchu">
            <div class="thumb">
                <img src="frontend/img/logo-small.png" class="logo" alt="">
            </div>
            <span class="page-name">Trang Quản Lý Nhân Khẩu</span>
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i></a>
        </li> -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{$user->nhankhau->HoTen}} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="editAccount"><i class="fa fa-fw fa-user"></i> Sửa tài khoản</a>
                </li>
                <li>
                    <a href="dangxuat"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>