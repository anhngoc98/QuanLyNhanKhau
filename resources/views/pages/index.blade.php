@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">
        @include('layout.slide')
        <div class="space20"></div>
        <div class="row main-left">
            @include('layout.menu')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h4 style="margin-top:0px; margin-bottom:0px;">Thông Tin Nhân Khẩu Của Bạn</h4>
                    </div>
                    <div class="panel-body">
                        <!-- item -->
                        <div class="row-item row">
                            <div class="clearfix quanhe">
                                <span class="span1">Quan hệ với chủ hộ: </span>
                                <span class="span2">{{$nhankhau->QuanHe}}</span>
                            </div>
                            <div class="info" style="margin-top:20px;">
                              <span class="info-name">Họ và tên:</span>
                              <span class="info-value" style="text-transform: uppercase;"> {{$nhankhau->HoTen}}</span>
                            </div class="info">
                            <div class="info">
                              <span class="info-name">Họ và tên gọi khác (nếu có): </span>
                              <span class="info-value">{{$nhankhau->HoTenKhac}}</span>
                            </div>
                            <div class="info clearfix">
                                <div class="div1">
                                    <span class="info-name">Ngày, tháng, năm sinh: </span>
                                    <span class="info-value">{{$nhankhau->NgaySinh}}</span>
                                </div>
                                <div class="div2">
                                    <span class="info-name">Giới tính (nam,nữ): </span>
                                    <span class="info-value">
                                        @if($nhankhau->GioiTinh == 1)
                                            {{"Nam"}}
                                        @else
                                            {{"Nữ"}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="info">
                              <span class="info-name">Quê quán: </span>
                              <span class="info-value"> {{$nhankhau->hokhau->thonxom->TenThonXom}} - {{$nhankhau->hokhau->thonxom->xaphuong->TenXaPhuong}} - Hoài Đức - Hà Nội</span>
                            </div>
                            <div class="info clearfix">
                                <div class="div1">
                                    <span class="info-name">Dân tộc: </span>
                                    <span class="info-value">{{$nhankhau->DanToc}}</span>
                                </div>
                                <div class="div2" style="margin-left:98px">
                                    <span class="info-name">Tôn giáo: </span>
                                    <span class="info-value">
                                        @if($nhankhau->TonGiao == "")
                                            {{"Không"}}
                                        @else
                                            {{$nhankhau->TonGiao}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="info clearfix">
                                <div class="div1">
                                    <span class="info-name">CMND số: </span>
                                    <span class="info-value">{{$nhankhau->CMND}}</span>
                                </div>
                                <div class="div2">
                                    <span class="info-name">Hộ chiếu số: </span>
                                    <span class="info-value">{{$nhankhau->HoChieu}}</span>
                                </div>
                            </div>
                            <div class="info">
                              <span class="info-name">Nghề nghiệp, nơi làm việc: </span>
                              <span class="info-value">{{$nhankhau->NgheNghiep}}</span>
                            </div>
                            <div class="info" style="margin-left: 190px !important;">
                              <span class="info-value">{{$nhankhau->NoiLamViec}}</span>
                            </div>
                            <div class="info">
                              <span class="info-name">Chuyển đến ngày: </span>
                              <span class="info-value">{{$nhankhau->NgayChuyenDen}}</span>
                            </div>
                            <div class="info">
                              <span class="info-name">Nơi thường trú trước khi chuyển đến: </span>
                              <span class="info-value">{{$nhankhau->ThuongTruTruoc}}</span>
                            </div>
                            <div class="info">
                              <span class="info-name">Ngày cấp: </span>
                              <span class="info-value">{{$nhankhau->NgayCap}}</span>
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