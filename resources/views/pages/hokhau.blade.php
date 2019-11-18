@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="space20"></div>
        <div class="row main-left">
            @include('layout.menu')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h4 style="margin-top:0px; margin-bottom:0px;">Thông Tin Hộ Khẩu</h4>
                    </div>
                    <div class="panel-body">
                        <!-- item -->
                        <div class="row-item row">
                            <div class="clearfix quanhe">
                                <h4>SỔ HỘ KHẨU</h4>
                            </div>
                            <div class="info" style="margin-left: 125px;">
                              <span class="info-name">Số: </span>
                              <span class="info-value" style="text-transform: uppercase;">{{$hokhau->MaHoKhau}}</span>
                            </div class="info">
                            <div class="info">
                              <span class="info-name">Họ và tên chủ hộ: </span>
                              <span class="info-value">{{$hokhau->TenChuHo}}</span>
                            </div>
                            <div class="info clearfix">
                                <span class="info-name">Nơi thường trú: </span>
                                <span class="info-value">{{$hokhau->thonxom->TenThonXom}} - {{$hokhau->thonxom->xaphuong->TenXaPhuong}} - Hoài Đức - Hà Nội</span>
                            </div>
                            <div class="info">
                              <span class="info-name">Ngày cấp: </span>
                              <span class="info-value">{{$hokhau->NgayCap}}</span>
                            </div>
                            <div class="info">
                              <span class="info-name">Hồ sơ hộ khẩu số: </span>
                              <span class="info-value">{{$hokhau->HoSoHK}}</span>
                            </div>
                            <div class="info clearfix">
                                <div class="div1">
                                    <span class="info-name">Sổ đăng ký thường trú số: </span>
                                    <span class="info-value">{{$hokhau->SoDKTT}}</span>
                                </div>
                                <div class="div2">
                                    <span class="info-name">Tờ số: </span>
                                    <span class="info-value">{{$hokhau->ToSo}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection