@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="header clearfix ">
                    <h2 class="title">Tài khoản
                    <i class="fa fa-angle-double-right"></i><span class="page"> Sửa</span>
                    </h2>
                </div>        
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" action="admin/editaccount" method="POST" enctype="multipart/form-data">
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
                    <div class="form-group clearfix" style="margin-top:10px">
                        <label for="inputEmail3" class="col-sm-2 control-label">Quyền</label>
                        <div class="col-sm-8" style="float:left">
                            <select class="form-control" name="Quyen" readonly="">
                                <option value="">-- Chọn quyền --</option>
                                @foreach($quyen as $q)
                                    <option value="{{$q->id}}"
                                    @if($user->idRole == $q->id)
                                        {{"selected"}}
                                    @endif    
                                    >{{$q->TenQuyen}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="SoDienThoai" value="{{$user->SoDienThoai}}">
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Nhập tên đăng nhập" name="TenDangNhap" value="{{$user->TenDangNhap}}" readonly="">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        
                        <label for="inputEmail3" class="col-sm-2 control-label">Đổi mật khẩu</label>
                        <input type="checkbox" id="changePassword" name="changePassword" style="margin: 10px 0 0 15px; width:20px; height:20px;">
                    </div>

                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu mới</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control password" id="" placeholder="Nhập mật khẩu" name="MatKhau" disabled="">
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nhập lại MK mới</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control password" id="" placeholder="Nhập lại mật khẩu" name="MatKhauAgain" disabled="">
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

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection