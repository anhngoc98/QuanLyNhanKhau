@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="header clearfix ">
                    <h4 class="title">Hộ Khẩu
                    <i class="fa fa-angle-double-right"></i><span class="page"> Sửa</span>
                    </h4>
                </div>        
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-top:10px;">
                <form class="form-horizontal" action="admin/hokhau/sua/{{$hokhau->id}}" method="POST" enctype="multipart/form-data">
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
                            <label for="inputEmail3" class="col-sm-4 control-label">Mã hộ khẩu</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập mã hộ khẩu" name="MaHK" value="{{$hokhau->MaHoKhau}}">
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix" style="float:left; padding-left:0;" >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Tên chủ hộ</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="text" class="form-control" id="" placeholder="Nhập tên chủ hộ" name="TenChuHo" value="{{$hokhau->TenChuHo}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group clearfix">   
                        <label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:10px;">Địa chỉ</label>
                        <div class="col-sm-3" style="float:left">
                            <select class="form-control" name="XaPhuong" id="XaPhuong">
                                <option value="">-- Chọn xã phường --</option>
                                @foreach($xaphuong as $xp)
                                    <option 
                                    @if($hokhau->thonxom->xaphuong->id == $xp->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$xp->id}}">{{$xp->TenXaPhuong}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3" style="float:left">
                            <select class="form-control" name="ThonXom" id="ThonXom">
                                <option value="">-- Chọn thôn xóm --</option>
                                @foreach($thonxom as $tx)
                                    <option 
                                    @if($hokhau->thonxom->id == $tx->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$tx->id}}">{{$tx->TenThonXom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-6 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">Ngày cấp</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="date" class="form-control" id="" placeholder="Nhập ngày cấp" name="NgayCap" value="{{$hokhau->NgayCap}}">
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Hồ sơ hộ khẩu</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="number" class="form-control" id="" placeholder="Nhập HSHK" name="HSHK" value="{{$hokhau->HoSoHK}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-6 clearfix" style="float:left; padding-right:0;">
                            <label for="inputEmail3" class="col-sm-4 control-label">Sổ đăng ký</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="number" class="form-control" id="" placeholder="Nhập sổ ĐKTT" name="ĐKTT" value="{{$hokhau->SoDKTT}}">
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix" style="float:left; padding-left:0; " >
                            <label for="inputEmail3" class="col-sm-3 control-label" style="padding:5px 0 0 0;">Tờ số</label>
                            <div class="col-sm-8" style="float:left">
                                <input type="number" class="form-control" id="" placeholder="Nhập tờ số" name="ToSo" value="{{$hokhau->ToSo}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group clearfix">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success submit">Lưu</button>
                            <button type="reset" class="btn btn-default submit">Reset</button>
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
            $("#XaPhuong").change(function(){
                var idXaPhuong = $(this).val();
                $.get("admin/ajax/thonxom/"+idXaPhuong, function(data){
                    $("#ThonXom").html(data);
                });
            });
        });
    </script>
@endsection