@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="header clearfix ">
                    <h2 class="title">Người Dùng
                    <i class="fa fa-angle-double-right"></i><span class="page"> Thêm</span>
                    </h2>
                </div>        
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <!--                    
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Mã nhân khẩu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập mã nhân khẩu" name="MaNhanKhau">
                        </div>
                    </div> -->
                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Quyền</label>
                        <div class="col-sm-8" style="float:left">
                            <select class="form-control" name="Quyen">
                                <option value="">-- Chọn quyền --</option>
                                @foreach($quyen as $q)
                                    <option value="{{$q->id}}">{{$q->TenQuyen}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="SoDienThoai">
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập tên đăng nhập" name="TenDangNhap">
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu" name="MatKhau">
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="" placeholder="Nhập lại mật khẩu" name="MatKhauAgain">
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