@extends('admin.app')
@section('content')
<div class="content">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Quản lý sổ hộ khẩu phường A</h4>
                        <a class="btn btn-primary" href="http://localhost:8000/manage/users/create">
                                Thêm 
                        </a>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead class="text-primary">
                                <tr><th>Số</th>
                                <th>Họ và tên chủ hộ</th>
                                <th>Địa chỉ thường trú</th>
                                <th>Hoạt động</th>
                            </tr></thead>
                            <tbody>
                                <tr>
                                    <td>187586971</td>
                                    <td>Nguyễn Văn An</td>
                                    <td>Nam</td>
                                    <td>12/03/1997</td>
                                    <td>Số nhà 14, Tổ dân phố A, Phường B, Thành phố C</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary btn-edit" data-href=""><i class="nc-icon nc-scissors"></i></button>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalDelete7"><i class="nc-icon nc-simple-remove"></i></button>

                                                <!-- Modal -->
                                                <div id="modalDelete7" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="display: block;">
                                                                <button type="button" class="close" data-dismiss="modal">×
                                                                </button>
                                                                <h4 class="modal-title">Xóa</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc chắn muốn xóa?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="http://localhost:8000/manage/users/7" method="post">
                                                                    <input type="hidden" name="_token" value="vpQzFluvs1tnNioYWCTF6cjxM66repJhs06OkJja">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>187586971</td>
                                    <td>Nguyễn Văn An</td>
                                    <td>Nam</td>
                                    <td>12/03/1997</td>
                                    <td>Số nhà 14, Tổ dân phố A, Phường B, Thành phố C</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary btn-edit" data-href=""><i class="nc-icon nc-scissors"></i></button>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalDelete7"><i class="nc-icon nc-simple-remove"></i></button>

                                                <!-- Modal -->
                                                <div id="modalDelete7" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="display: block;">
                                                                <button type="button" class="close" data-dismiss="modal">×
                                                                </button>
                                                                <h4 class="modal-title">Xóa</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc chắn muốn xóa?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="http://localhost:8000/manage/users/7" method="post">
                                                                    <input type="hidden" name="_token" value="vpQzFluvs1tnNioYWCTF6cjxM66repJhs06OkJja">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>187586971</td>
                                    <td>Nguyễn Văn An</td>
                                    <td>Nam</td>
                                    <td>12/03/1997</td>
                                    <td>Số nhà 14, Tổ dân phố A, Phường B, Thành phố C</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary btn-edit" data-href=""><i class="nc-icon nc-scissors"></i></button>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalDelete7"><i class="nc-icon nc-simple-remove"></i></button>

                                                <!-- Modal -->
                                                <div id="modalDelete7" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="display: block;">
                                                                <button type="button" class="close" data-dismiss="modal">×
                                                                </button>
                                                                <h4 class="modal-title">Xóa</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc chắn muốn xóa?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="http://localhost:8000/manage/users/7" method="post">
                                                                    <input type="hidden" name="_token" value="vpQzFluvs1tnNioYWCTF6cjxM66repJhs06OkJja">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>187586971</td>
                                    <td>Nguyễn Văn An</td>
                                    <td>Nam</td>
                                    <td>12/03/1997</td>
                                    <td>Số nhà 14, Tổ dân phố A, Phường B, Thành phố C</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary btn-edit" data-href=""><i class="nc-icon nc-scissors"></i></button>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalDelete7"><i class="nc-icon nc-simple-remove"></i></button>

                                                <!-- Modal -->
                                                <div id="modalDelete7" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="display: block;">
                                                                <button type="button" class="close" data-dismiss="modal">×
                                                                </button>
                                                                <h4 class="modal-title">Xóa</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc chắn muốn xóa?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="http://localhost:8000/manage/users/7" method="post">
                                                                    <input type="hidden" name="_token" value="vpQzFluvs1tnNioYWCTF6cjxM66repJhs06OkJja">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>187586971</td>
                                    <td>Nguyễn Văn An</td>
                                    <td>Nam</td>
                                    <td>12/03/1997</td>
                                    <td>Số nhà 14, Tổ dân phố A, Phường B, Thành phố C</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary btn-edit" data-href=""><i class="nc-icon nc-scissors"></i></button>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalDelete7"><i class="nc-icon nc-simple-remove"></i></button>

                                                <!-- Modal -->
                                                <div id="modalDelete7" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="display: block;">
                                                                <button type="button" class="close" data-dismiss="modal">×
                                                                </button>
                                                                <h4 class="modal-title">Xóa</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc chắn muốn xóa?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="http://localhost:8000/manage/users/7" method="post">
                                                                    <input type="hidden" name="_token" value="vpQzFluvs1tnNioYWCTF6cjxM66repJhs06OkJja">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>187586971</td>
                                    <td>Nguyễn Văn An</td>
                                    <td>Nam</td>
                                    <td>12/03/1997</td>
                                    <td>Số nhà 14, Tổ dân phố A, Phường B, Thành phố C</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary btn-edit" data-href=""><i class="nc-icon nc-scissors"></i></button>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalDelete7"><i class="nc-icon nc-simple-remove"></i></button>

                                                <!-- Modal -->
                                                <div id="modalDelete7" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="display: block;">
                                                                <button type="button" class="close" data-dismiss="modal">×
                                                                </button>
                                                                <h4 class="modal-title">Xóa</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc chắn muốn xóa?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="http://localhost:8000/manage/users/7" method="post">
                                                                    <input type="hidden" name="_token" value="vpQzFluvs1tnNioYWCTF6cjxM66repJhs06OkJja">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>187586971</td>
                                    <td>Nguyễn Văn An</td>
                                    <td>Nam</td>
                                    <td>12/03/1997</td>
                                    <td>Số nhà 14, Tổ dân phố A, Phường B, Thành phố C</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary btn-edit" data-href=""><i class="nc-icon nc-scissors"></i></button>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalDelete7"><i class="nc-icon nc-simple-remove"></i></button>

                                                <!-- Modal -->
                                                <div id="modalDelete7" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="display: block;">
                                                                <button type="button" class="close" data-dismiss="modal">×
                                                                </button>
                                                                <h4 class="modal-title">Xóa</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc chắn muốn xóa?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="http://localhost:8000/manage/users/7" method="post">
                                                                    <input type="hidden" name="_token" value="vpQzFluvs1tnNioYWCTF6cjxM66repJhs06OkJja">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="pagination" role="navigation">
                            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                <span class="page-link" aria-hidden="true">‹</span>
                            </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="http://localhost:8000/manage/users?page=2">2</a></li>
                            <li class="page-item">
                                <a class="page-link" href="http://localhost:8000/manage/users?page=2" rel="next" aria-label="Next »">›</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection