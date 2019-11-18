@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header" style="margin-bottom:0">
                        <div class="clearfix header-top">
                            <h4 class="title col-md-8">Hộ Khẩu
                                <i class="fa fa-angle-double-right"></i><span class="page"> Thông Tin Nhân Khẩu</span>
                            </h4>
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
                            <form class="form-filter" action="admin/hokhau/diachi" method="post">
                                {{csrf_field()}}
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
                    <div class="content table-responsive table-full-width clearfix">
                        @foreach($nhankhau as $item)
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