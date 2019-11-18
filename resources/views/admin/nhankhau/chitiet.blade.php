@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="clearfix header-top">
                            <h3 class="title col-md-8">Nhân Khẩu
                                <i class="fa fa-angle-double-right"></i><span class="page"> Chi tiết</span>
                            </h3>
                            <form class="form-search col-md-4" action="admin/nhankhau/timkiem" method="post">
                                {{csrf_field()}}
                                <div class="input-group no-border">
                                    <input type="text" value="" id="tukhoa" name="tukhoa" class="form-control" placeholder="Tìm kiếm...">
                                    <div class="input-group-append">
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text"><i class="nc-icon nc-zoom-split"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="manipulation clearfix">
                            <a class="btn btn-info btn-xs add" href="admin/nhankhau/them" style="font-size:15px">
                                <i class="fa fa-plus-circle"></i> Thêm 
                            </a>
                            <form class="form-filter">
                                <div class="form-group clearfix col-md-5">
                                    <div class="filter">
                                        <select class="form-control" name="XaPhuong" id="XaPhuong">
                                            <option value="">-- Chọn xã phường --</option>
                                            @foreach($xaphuong as $xp)
                                                <option value="{{$xp->id}}">{{$xp->TenXaPhuong}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix col-md-5">   
                                    <div class="filter">
                                        <select class="form-control" name="ThonXom" id="ThonXom">
                                            <option value="">-- Chọn thôn xóm --</option>
                                            @foreach($thonxom as $tx)
                                                <option value="{{$tx->id}}">{{$tx->TenThonXom}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix col-md-2 search">   
                                    <div class="filter">
                                        <button type="submit" class="btn btn-success submit">Tìm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
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
                                <!-- <div class="info">
                                    <span class="info-name">Ngày cấp: </span>
                                    <span class="info-value">25-12-2009</span>
                                </div> -->
                            </div>
                            <!-- end item -->
                        </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#XaPhuong").change(function(){
                var idXaPhuong = $(this).val();
                $.get("admin/ajax/thonxom/"+idXaPhuong, function(data){
                    $("#ThonXom").html(data);
                });
            });
            $("#tukhoa").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#info tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
             });
        });

      
    </script>
@endsection