@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="header clearfix ">
                    <h2 class="title">Nhân Khẩu
                    <i class="fa fa-angle-double-right"></i><span class="page"> Sửa</span>
                    </h2>
                </div>        
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" action="admin/nhankhau/sua/{{$nhankhau->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="form-group clearfix">
                        <div class="col-sm-6 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">Quan hệ</label>
                            <div class="col-sm-8" style="float:left">
                                <select class="form-control" name="QuanHe">
                                    <option value="">-- Chọn quan hệ với chủ hộ --</option>
                                    <option value="Chủ hộ" @if($nhankhau->QuanHe == "Chủ hộ") {{"selected"}} @endif>Chủ hộ</option>
                                    <option value="Vợ" @if($nhankhau->QuanHe == "Vợ") {{"selected"}} @endif>Vợ</option>
                                    <option value="Chồng" @if($nhankhau->QuanHe == "Chồng") {{"selected"}} @endif>Chồng</option>
                                    <option value="Con" @if($nhankhau->QuanHe == "Con") {{"selected"}} @endif>Con</option>
                                    <option value="Con dâu" @if($nhankhau->QuanHe == "Con dâu") {{"selected"}} @endif>Con dâu</option>
                                    <option value="Bố" @if($nhankhau->QuanHe == "Bố") {{"selected"}} @endif>Bố</option>
                                    <option value="Mẹ" @if($nhankhau->QuanHe == "Mẹ") {{"selected"}} @endif>Mẹ</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Mã HK</label>
                            <div class="col-sm-8" style="float:left">
                                <select class="form-control" name="MaHK">
                                    <option value="">-- Chọn mã HK và tên chủ hộ --</option>
                                    @foreach($hokhau as $hk)
                                        <option 
                                        @if($nhankhau->idHoKhau == $hk->id)
                                            {{"selected"}}

                                        @endif
                                        value="{{$hk->id}}">{{$hk->MaHoKhau}} - {{$hk->TenChuHo}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <div class="col-sm-6 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">Họ tên NK</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập họ tên nhân khẩu" name="HoTen" value="{{$nhankhau->HoTen}}">
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Họ tên khác</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập họ tên khác" name="HoTenKhac" value="{{$nhankhau->HoTenKhac}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <div class="col-sm-6 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">Giới tính</label>
                            <div class="col-sm-8" style="float:left; padding-top:10px">
                                <input type="radio" name="GioiTinh"  value="1" @if($nhankhau->GioiTinh == 1) {{"checked"}} @endif> Nam
                                <input type="radio" style="margin-left:20px" name="GioiTinh" value="0" @if($nhankhau->GioiTinh == 0) {{"checked"}} @endif> Nữ
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Ngày sinh</label>
                            <div class="col-sm-8" style="float:left">
                            <input type="date" class="form-control" id="" placeholder="Nhập ngày sinh" name="NgaySinh" value="{{$nhankhau->NgaySinh}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">   
                        <label for="inputEmail3" class="col-sm-2 control-label">DT/QT/TG</label>
                        <div class="col-sm-3" style="float:left">
                            <select class="form-control" name="DanToc">
                                <option value="">-- Chọn dân tộc --</option>
                                <option value="Kinh" @if($nhankhau->DanToc == "Kinh") {{"selected"}} @endif >Kinh</option>
                                <option value="Tày"  @if($nhankhau->DanToc == "Tày") {{"selected"}} @endif>Tày</option>
                                <option value="Thái"  @if($nhankhau->DanToc == "Thái") {{"selected"}} @endif>Thái</option>
                                <option value="Mường"  @if($nhankhau->DanToc == "Mường") {{"selected"}} @endif>Mường</option>
                                <option value="Khơ Me"  @if($nhankhau->DanToc == "Khơ Me") {{"selected"}} @endif>Khơ Me</option>
                                <option value="H'Mông"  @if($nhankhau->DanToc == "H'Mông") {{"selected"}} @endif>H'Mông</option>
                                <option value="Nùng"  @if($nhankhau->DanToc == "Nùng") {{"selected"}} @endif>Nùng</option>

                            </select>
                        </div>
                        <div class="col-sm-3" style="float:left">
                            <select class="form-control" name="QuocTich">
                                <option value="">-- Chọn Quốc tịch --</option>
                                <option value="Việt Nam" @if($nhankhau->QuocTich == "Việt Nam") {{"selected"}} @endif>Việt Nam</option>
                                <option value="Lào" @if($nhankhau->QuocTich == "Lào") {{"selected"}} @endif>Lào</option>
                                <option value="Thái Lan" @if($nhankhau->QuocTich == "Thái Lan") {{"selected"}} @endif>Thái Lan</option>
                                <option value="Campuchia" @if($nhankhau->QuocTich == "Campuchia") {{"selected"}} @endif>Campuchia</option>
                                <option value="Philippin" @if($nhankhau->QuocTich == "Philippin") {{"selected"}} @endif>Philippin</option>

                            </select>
                        </div>
                        <div class="col-sm-3" style="float:left">
                        <select class="form-control" name="TonGiao">
                                <option value="">-- Chọn tôn giáo --</option>
                                <option value="Không" @if($nhankhau->TonGiao == "Không") {{"selected"}} @endif>Không</option>
                                <option value="Phật giáo" @if($nhankhau->TonGiao == "Phật giáo") {{"selected"}} @endif>Phật giáo</option>
                                <option value="Thiên chúa giáo" @if($nhankhau->TonGiao == "Thiên chúa giáo") {{"selected"}} @endif>Thiên chúa giáo</option>
                                <option value="Hồi giáo" @if($nhankhau->TonGiao == "Hồi giáo") {{"selected"}} @endif>Hồi giáo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-5 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">CMND</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập số CMND" name="CMND" value="{{$nhankhau->CMND}}">
                            </div>
                        </div>
                        <div class="col-sm-5 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Hộ chiếu</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập số hộ chiếu" name="HoChieu" value="{{$nhankhau->HoChieu}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nghề nghiệp</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập nghề nghiệp" name="NgheNghiep" value="{{$nhankhau->NgheNghiep}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nơi làm việc</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập nơi làm việc" name="NoiLamViec" value="{{$nhankhau->NoiLamViec}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Ngày chuyển đến</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="" placeholder="Nhập ngày chuyển đến" name="NgayChuyenDen" value="{{$nhankhau->NgayChuyenDen}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Thường trú trước</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập nơi thường trú trước" name="ThuongTruTruoc" value="{{$nhankhau->ThuongTruTruoc}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Lý do xóa</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập lý do xóa" name="LyDoXoa" value="{{$nhankhau->LyDoXoa}}">
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success submit">Lưu</button>
                            <button type="reset" class="btn btn-default submit">Làm mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>
@endsection