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
                        <h3 style="margin-top:0px; margin-bottom:0px;">Sửa tài khoản</h3>
                    </div>
                    <div class="panel-body">
                        <!-- item -->
                        <div class="row-item row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" action="editAccount" method="POST" enctype="multipart/form-data">
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
                                        <label for="inputEmail3" class="col-sm-2 control-label">Mã nhân khẩu</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id=""  name="MaNhanKhau" value="{{$user->nhankhau->MaNhanKhau}}" disabled>
                                                                                </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" style="padding-right: 10px;" class="col-sm-2 control-label">Tên đăng nhập</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id=""  name="TenDangNhap" value="{{$user->TenDangNhap}}">
                                                                                </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="" value="{{$user->SoDienThoai}}" name="SoDienThoai" >
                                                                                </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                        
                                        <label for="inputEmail3" class="col-sm-2 control-label">Đổi mật khẩu</label>
                                        <input type="checkbox" id="changePassword" name="changePassword" style="margin: 10px 0 0 15px; width:20px; height:20px;">
                                    </div>

                                    <div class="form-group clearfix">
                                        <label for="inputEmail3" style="padding-right: 10px;" class="col-sm-2 control-label">Mật khẩu mới</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control password" id="" placeholder="Nhập mật khẩu" name="MatKhau" disabled="">
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <label for="inputEmail3" style="padding-right: 0px; padding-left:0px" class="col-sm-2 control-label">Nhập lại MK mới</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control password" id="" placeholder="Nhập lại mật khẩu" name="MatKhauAgain" disabled="">
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Sửa</button>
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