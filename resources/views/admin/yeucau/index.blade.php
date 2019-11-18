@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="clearfix header-top">
                            <h4 class="title col-md-8">Yêu cầu
                                <i class="fa fa-angle-double-right"></i><span class="page"> Danh sách</span>
                            </h4>
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
                            <!-- <form class="form-filter">
                                <div class="form-group clearfix col-md-5">
                                    <div class="filter">
                                        <select class="form-control" name="ToDP">
                                            <option value="1">Xã Song Phương</option>
                                            <option value="2">Xã Lại Yên</option>
                                            <option value="6">Xã Sơn ĐỒng</option>
                                            <option value="18">Phường Minh Khai</option>
                                            <option value="19">Phường Cầu Diễn</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix col-md-5">   
                                    <div class="filter">
                                        <select class="form-control" name="ToDP">
                                            <option value="1">Thôn 1</option>
                                            <option value="2">Thôn 2</option>
                                            <option value="6">Xóm 1</option>
                                            <option value="18">Xóm 2</option>
                                            <option value="19">Xóm 3</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix col-md-2 search">   
                                    <div class="filter">
                                        <button type="submit" class="btn btn-success submit">Tìm</button>
                                    </div>
                                </div>
                            </form> -->
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
                                <th>Số ĐT</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                                @foreach($ycall as $item)
                                    <tr>
                                        <td>{{$item->user->nhankhau->MaNhanKhau}}</td>
                                        <td>{{$item->user->nhankhau->HoTen}}</td>
                                        <td>{{$item->user->SoDienThoai}}</td>
                                        <td>{{$item->TieuDe}}</td>
                                        <td>{{$item->NoiDung}}</td>
                                        <td>
                                            <a href="" class="btn btn-danger btn-xs see"> Chưa xử lý</a>
                                        </td> 
                                        <td class="center">
                                            <a href="admin/yeucau/xoa/{{$item->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o  fa-fw"></i> Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach    
                                
                               

                            </tbody>
                        </table>
                        <div class="clearfix" style="text-align:center">
                            {{$ycall->links()}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection