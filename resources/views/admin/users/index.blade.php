@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="clearfix header-top">
                            <h2 class="title col-md-8">Người Dùng
                                <i class="fa fa-angle-double-right"></i><span class="page"> Danh sách</span>
                            </h2>
                            <form class="form-search col-md-4">
                                <div class="input-group no-border">
                                    <input type="text" value="" class="form-control" placeholder="Tìm kiếm...">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="manipulation clearfix">
                            <a class="btn btn-info btn-xs add" href="admin/user/them" style="font-size:15px">
                                <i class="fa fa-plus-circle"></i> Thêm 
                            </a>
                            
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Tên đăng nhập</th>
                                <th>Số điện thoại</th>
                                <th>Quyền</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                                @foreach($users as $us)
                                    <tr>
                                        <td>{{$us->id}}</td>
                                        <td>
                                            @if($us->idNhanKhau == "")
                                                {{""}}
                                            @else
                                                {{$us->nhankhau->HoTen}}
                                            @endif
                                        </td>
                                        <td>{{$us->TenDangNhap}}</td>
                                        <td>{{$us->SoDienThoai}}</td>
                                        <td>
                                            @if($us->idRole == 1)
                                                {{"Người dân"}}
                                            @elseif($us->idRole == 2)
                                                {{"Cấp thôn/xóm"}}
                                            @elseif($us->idRole == 3)
                                                {{"Cấp xã/phường"}}
                                            @elseif($us->idRole == 4)
                                                {{"Admin"}}
                                            @elseif($us->idRole == 5)
                                                {{"Cấp tỉnh"}}
                                            @else
                                                {{"Cấp huyện"}}
                                            @endif    
                                        </td>
                                        <td class="center">
                                            <a href="admin/user/xoa/{{$us->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
                                            <a href="admin/user/sua/{{$us->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="clearfix">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection