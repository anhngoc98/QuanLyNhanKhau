@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="header clearfix ">
                    <h3 class="title">Nhân Khẩu
                    <i class="fa fa-angle-double-right"></i><span class="page"> Thêm</span>
                    </h3>
                </div>        
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-top:10px;">
                <form class="form-horizontal" action="admin/nhankhau/them" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif


                    <div class="form-group clearfix">
                        <div class="col-sm-6 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">Quah hệ</label>
                            <div class="col-sm-8" style="float:left">
                                <select class="form-control" name="QuanHe">
                                    <option value="">-- Chọn quan hệ với chủ hộ --</option>
                                    <option value="Vợ">Vợ</option>
                                    <option value="Chồng">Chồng</option>
                                    <option value="Con">Con</option>
                                    <option value="Con dâu">Con dâu</option>
                                    <option value="Bố">Bố</option>
                                    <option value="Mẹ">Mẹ</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Mã HK</label>
                            <div class="col-sm-8" style="float:left">
                                <select class="form-control" name="MaHK">
                                    <option value="">-- Chọn mã HK và tên chủ hộ --</option>
                                    @foreach($hokhau as $hk)
                                        <option value="{{$hk->id}}">{{$hk->MaHoKhau}} - {{$hk->TenChuHo}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <div class="col-sm-6 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">Họ tên NK</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập họ tên nhân khẩu" name="HoTen">
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Họ tên khác</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập họ tên khác" name="HoTenKhac">
                            </div>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <div class="col-sm-6 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">Giới tính</label>
                            <div class="col-sm-8" style="float:left; padding-top:10px">
                                <input type="radio" name="GioiTinh" checked="" value="1"> Nam
                                <input type="radio" style="margin-left:20px" name="GioiTinh" value="0"> Nữ
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Ngày sinh</label>
                            <div class="col-sm-8" style="float:left">
                            <input type="date" class="form-control" id="" placeholder="Nhập ngày sinh" name="NgaySinh">
                            </div>
                        </div>
                    </div>

                    <div class="form-group clearfix">   
                        <label for="inputEmail3" class="col-sm-2 control-label">DT/QT/TG</label>
                        <div class="col-sm-3" style="float:left">
                            <select class="form-control" name="DanToc">
                                <option value="">-- Chọn dân tộc --</option>
                                <option value="Kinh">Kinh</option>
                                <option value="Tày">Tày</option>
                                <option value="Thái">Thái</option>
                                <option value="Mường">Mường</option>
                                <option value="Khơ Me">Khơ Me</option>
                                <option value="H'Mông">H'Mông</option>
                                <option value="Nùng">Nùng</option>

                            </select>
                        </div>
                        <div class="col-sm-3" style="float:left">
                            <select class="form-control" name="QuocTich">
                                <option value="">-- Chọn Quốc tịch --</option>
                                <option value="Việt Nam">Việt Nam</option>
                                <option value="Lào">Lào</option>
                                <option value="Thái Lan">Thái Lan</option>
                                <option value="Campuchia">Campuchia</option>
                                <option value="Philippin">Philippin</option>

                            </select>
                        </div>
                        <div class="col-sm-3" style="float:left">
                        <select class="form-control" name="TonGiao">
                                <option value="">-- Chọn tôn giáo --</option>
                                <option value="Không">Không</option>
                                <option value="Phật giáo">Phật giáo</option>
                                <option value="Thiên chúa giáo">Thiên chúa giáo</option>
                                <option value="Hồi giáo">Hồi giáo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-5 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">CMND</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập số CMND" name="CMND">
                            </div>
                        </div>
                        <div class="col-sm-5 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Hộ chiếu</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập số hộ chiếu" name="HoChieu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nghề nghiệp</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập nghề nghiệp" name="NgheNghiep">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nơi làm việc</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập nơi làm việc" name="NoiLamViec">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Ngày chuyển đến</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="" placeholder="Nhập ngày chuyển đến" name="NgayChuyenDen">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Thường trú trước</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập nơi thường trú trước" name="ThuongTruTruoc">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Lý do xóa</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập lý do xóa" name="LyDoXoa">
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
