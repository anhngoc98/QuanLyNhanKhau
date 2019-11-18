@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="clearfix header-top">
                            <h4 class="title col-md-8">Thống Kê
                                <i class="fa fa-angle-double-right"></i><span class="page"> {{$xaphuong->TenXaPhuong}}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <i class="fa fa-home" style="color:#F3BB45;"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Hộ Khẩu</p>
                                    {{$hokhau}}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated now
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <i class="fa fa-user" style="color:#68B3C8"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Nhân Khẩu</p>
                                    {{$nhankhau}}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-calendar"></i> Last day
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="fa fa-calendar" style="color:#EB5E28"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Tuổi TB</p>
                                    {{$tuoitb}}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-timer"></i> In the last hour
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <i class="fa fa-transgender" style="color:#7AC29A"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers" style="font-size:25px">
                                    <p>Nam/Nữ</p>
                                    {{$nam}}/{{$nu}}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-reload"></i> Updated now
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="clearfix header-top">
                            <h4 class="title col-md-8">Thống Kê
                                <i class="fa fa-angle-double-right"></i><span class="page"> Xã Phường</span>
                            </h4>
                            <form class="form-search col-md-4" action="admin/hokhau/timkiem" method="post">
                                {{csrf_field()}}
                                <div class="input-group no-border">
                                    <input type="text" value="" id="tukhoa" name="tukhoa" class="form-control" placeholder="Tìm kiếm...">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text"><i class="nc-icon nc-zoom-split"></i></button>
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
                                <th>STT</th>
                                <th>Tên Xã</th>
                                <th>Thống kê</th>
                            </thead>
                            <tbody id="info">
                                
                                <?php $stt = 1; foreach($xaphuongall as $xp): ?>
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$xp->TenXaPhuong}}</td>
                                            <td>
                                                <a href="admin/thongke/chitiet/{{$xp->id}}" class="btn btn-success btn-xs see"> Xem thống kê</a>
                                            </td>  
                                        </tr>
                                    <?php $stt++; endforeach ?>
                            </tbody>
                            
                        </table>
                        <div class="clearfix" style="text-align:center">
                            {{$xaphuongall->links()}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection