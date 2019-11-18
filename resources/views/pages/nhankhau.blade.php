@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="space20"></div>
        <div class="row main-left">
            @include('layout.menu')
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h4 style="margin-top:0px; margin-bottom:0px;">Thông Tin Nhân Khẩu Trong Hộ</h4>
                    </div>
                    @foreach($nhankhaus as $item)
                            <div class="panel-body col-md-6" style="float:left;">
                                <!-- item -->
                                <div class="row-item row" style="border-right: 1px solid #000">
                                    <div class="clearfix quanhe" style="margin-left:40px">
                                        <span class="span1">Quan hệ với chủ hộ: </span>
                                        <span class="span2">{{$item->QuanHe}}</span>
                                    </div>
                                    <div class="info" style="margin-top:5px;">
                                    <span class="info-name">Họ và tên:</span>
                                    <span class="info-value" style="text-transform: uppercase;"> {{$item->HoTen}}</span>
                                    </div class="info">
                                    <div class="info">
                                    <span class="info-name">Họ và tên gọi khác (nếu có): </span>
                                    <span class="info-value">{{$item->HoTenKhac}}</span>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="div1">
                                            <span class="info-name">Ngày, tháng, năm sinh: </span>
                                            <span class="info-value">{{$item->NgaySinh}}</span>
                                        </div>
                                        <div class="div2" style="margin:0; margin-top:10px;">
                                            <span class="info-name">Giới tính (nam,nữ): </span>
                                            <span class="info-value">
                                                @if($item->GioiTinh == 1)
                                                    {{"Nam"}}
                                                @else
                                                    {{"Nữ"}}
                                                @endif    
                                            </span>
                                        </div>
                                    </div>
                                    <div class="info">
                                    <span class="info-name">Quê quán: </span>
                                    <span class="info-value"> {{$item->hokhau->thonxom->TenThonXom}} - {{$item->hokhau->thonxom->xaphuong->TenXaPhuong}} - Hoài Đức - Hà Nội</span>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="div1">
                                            <span class="info-name">Dân tộc: </span>
                                            <span class="info-value">{{$item->DanToc}}</span>
                                        </div>
                                        <div class="div2" style="margin-left:98px">
                                            <span class="info-name">Tôn giáo: </span>
                                            <span class="info-value">
                                                @if($item->TonGiao == "")
                                                    {{"Không"}}
                                                @else
                                                    {{$item->TonGiao}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="div1">
                                            <span class="info-name">CMND số: </span>
                                            <span class="info-value">{{$item->CMND}}</span>
                                        </div>
                                        <div class="div2">
                                            <span class="info-name">Hộ chiếu số: </span>
                                            <span class="info-value">{{$item->HoChieu}}</span>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="info-name">Nghề nghiệp, nơi làm việc: </span>
                                        <span class="info-value">{{$item->NgheNghiep}}</span>
                                    </div>
                                        <div class="info" style="margin-left: 190px !important;">
                                        <span class="info-value">{{$item->NoiLamViec}}</span>
                                    </div>
                                    <div class="info">
                                        <span class="info-name">Chuyển đến ngày: </span>
                                        <span class="info-value">{{$item->NgayChuyenDen}}</span>
                                    </div>
                                    <div class="info">
                                        <span class="info-name">Nơi thường trú trước khi chuyển đến: </span>
                                        <span class="info-value">{{$item->ThuongTruTruoc}}</span>
                                    </div>
                                    <!-- <div class="info">
                                        <span class="info-name">Ngày cấp: </span>
                                        <span class="info-value">25-12-2009</span>
                                    </div> -->
                                </div>
                                <!-- end item -->
                            </div>
                        @endforeach    
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection