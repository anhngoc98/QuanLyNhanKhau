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
                        <h4 style="margin-top:0px; margin-bottom:0px;">Yêu Cầu Cập Nhật</h4>
                    </div>
                    <div class="panel-body">
                        <!-- item -->
                        <div class="row-item row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" action="yeucau" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id=""  name="name" value="{{$user->nhankhau->HoTen}}" disabled>
                                                                                </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id=""  name="SoDt" value="{{$user->SoDienThoai}}" disabled>
                                                                                </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="" value="{{$user->nhankhau->hokhau->thonxom->TenThonXom}} - {{$user->nhankhau->hokhau->thonxom->xaphuong->TenXaPhuong}} - Hoài Đức - Hà Nội" name="DiaChi" disabled>
                                                                                </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Đối tượng</label>
                                        <div class="col-sm-8" style="margin-top: 10px;">
                                            <input type="radio" name="DoiTuong" checked="" value="1"> Nhân khẩu
                                            <input type="radio" style="margin-left:20px" name="DoiTuong" value="0"> Hộ khẩu
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="" placeholder="Nhập tiêu đề" name="TieuDe">
                                                                                </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Nội dung</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="NoiDung" placeholder="Nhập nội dung" rows="4"></textarea>
                                                                                </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Gửi</button>
                                        </div>
                                    </div>
                                </form>
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