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
                                <i class="fa fa-angle-double-right"></i><span class="page"> Danh sách</span>
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
                            <form class="form-filter" action="" method="get">
                                <div class="form-group clearfix col-md-5">
                                    <div class="filter">
                                        <select class="form-control" name="XaPhuong" id="XaPhuong">
                                            <option value="">-- Chọn xã phường --</option>
                                            @foreach($xaphuong as $xp)
                                                <option value="{{$xp->id}}" {{ request()->XaPhuong == $xp->id ? "selected" : "" }}>{{$xp->TenXaPhuong}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix col-md-5">   
                                    <div class="filter">
                                        <select class="form-control" name="ThonXom" id="ThonXom">
                                            <option value="">-- Chọn thôn xóm --</option>
                                            @foreach($thonxom as $tx)
                                                <option value="{{$tx->id}}" {{ request()->ThonXom == $tx->id ? "selected" : "" }}>{{$tx->TenThonXom}}</option>
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
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <th>Mã NK</th>
                                <th>Họ tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Xem chi tiết</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody id="info">
                                @foreach($nhankhau as $nk)
                                    <tr>
                                        <td>{{$nk->MaNhanKhau}}</td>
                                        <td>{{$nk->HoTen}}</td>
                                        <td>
                                            @if($nk->GioiTinh == 0)
                                                {{"Nữ"}}
                                            @else
                                                {{"Nam"}}
                                            @endif    
                                        </td>
                                        <td>{{$nk->NgaySinh}}</td>
                                        <td>{{$nk->hokhau->thonxom->TenThonXom}} - {{$nk->hokhau->thonxom->xaphuong->TenXaPhuong}}</td>
                                        <td>
                                            <a href="admin/nhankhau/chitiet/{{$nk->id}}" class="btn btn-success btn-xs see"> Xem</a>
                                        </td>  
                                        <td class="center">
                                            <a href="admin/nhankhau/xoa/{{$nk->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
                                            <a href="admin/nhankhau/sua/{{$nk->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
                                        </td>
                                    </tr>
                                @endforeach    
                            </tbody>
                        </table>
                        <div class="clearfix" style="text-align:center">
                            {{$nhankhau->links()}}
                        </div>
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