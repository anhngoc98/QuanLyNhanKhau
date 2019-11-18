@extends('admin.app')
@section('content')
    <?php
        function doimau($str, $tukhoa)
        {
            return str_replace($tukhoa, "<span style='color:red;'>$tukhoa</span>", $str);
        }
    ?>
<div class="content">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="clearfix header-top">
                            <h4 class="title col-md-8">Hộ Khẩu
                                <i class="fa fa-angle-double-right"></i><span class="page"> Tìm kiếm: {{$tukhoa}}</span>
                            </h4>
                            <form class="form-search col-md-4" action="admin/hokhau/timkiem" method="post">
                                {{csrf_field()}}
                                <div class="input-group no-border">
                                    <input type="text" value="" name="tukhoa" class="form-control" placeholder="Tìm kiếm...">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text"><i class="nc-icon nc-zoom-split"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="manipulation clearfix">
                            <a class="btn btn-info btn-xs add" href="admin/hokhau/them" style="font-size:15px">
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
                </div>

                    <div class="content table-responsive table-full-width">
                        <!-- @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif -->
                        <table class="table table-striped">
                            <thead>
                                <th>Mã HK</th>
                                <th>Tên chủ hộ</th>
                                <th>Địa chỉ</th>
                                <th>Ngày cấp</th>
                                <th>Thông tin NK</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                                @foreach($hokhau as $hk)
                                <tr>
                                    <td>{!!doimau($hk->MaHoKhau, $tukhoa)!!}</td>
                                    <td>{!!doimau($hk->TenChuHo, $tukhoa)!!}</td>
                                    <td>{{$hk->thonxom->TenThonXom}} - {{$hk->thonxom->xaphuong->TenXaPhuong}}</td>
                                    <td>{!!doimau($hk->NgayCap, $tukhoa)!!}</td>
                                    <td>
                                        <a href="admin/hokhau/chitiet/{{$hk->id}}" class="btn btn-success btn-xs view see"> Xem</a>
                                    </td>   
                                    <td class="center">
                                        <a href="admin/hokhau/xoa/{{$hk->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
                                        <a href="admin/hokhau/sua/{{$hk->id}}" class="btn btn-info btn-xs"><i class="fa fa-pencil fa-fw"></i> Sửa</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="clearfix">
                            {{$hokhau->links()}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

<!-- @section('scripts')
    <script>
        $(document).ready(function(){
            $("#XaPhuong").change(function(){
                var idXaPhuong = $(this).val();
                $.get("admin/ajax/thonxom/"+idXaPhuong, function(data){
                    $("#ThonXom").html(data);
                });
            });
        });
    </script>
@endsection -->