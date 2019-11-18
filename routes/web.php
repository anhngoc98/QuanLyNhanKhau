<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/','AdminController@index');

Route::get('/', 'UserController@getDangNhap');
Route::post('/', 'UserController@postDangNhap');
Route::get('dangky', 'UserController@getDangKy');
Route::post('dangky', 'UserController@postDangKy');
Route::get('admin/dangxuat', 'UserController@getDangXuat');
Route::get('admin/editaccount', 'UserController@getEdit');
Route::post('admin/editaccount', 'UserController@postEdit');
Route::get('admin/ajax/dangky/{id}', 'AjaxController@GetMaNhanKhau');

Route::group(['prefix'=>'admin', 'middleware' => 'Login'], function(){
    //hộ khẩu
    Route::group(['prefix'=>'hokhau'], function(){
        //admin/nhankhau/...
        Route::get('', 'HoKhauController@getDanhSach');

        Route::get('them', 'HoKhauController@getThem');
        Route::post('them', 'HoKhauController@postThem');
        
        Route::get('sua/{id}', 'HoKhauController@getSua');
        Route::post('sua/{id}', 'HoKhauController@postSua');

        Route::get('xoa/{id}', 'HoKhauController@getXoa');

        Route::post('timkiem', 'HoKhauController@timkiem');

        Route::post('diachi', 'HoKhauController@loc_diachi');

        Route::get('chitiet/{id}', 'HoKhauController@chitiet');
    });
    //nhan khau
    Route::group(['prefix'=>'nhankhau'], function(){
        //admin/nhankhau/...
        Route::get('', 'NhanKhauController@getDanhSach');

        Route::get('them', 'NhanKhauController@getThem');
        Route::post('them', 'NhanKhauController@postThem');
        
        Route::get('sua/{id}', 'NhanKhauController@getSua');
        Route::post('sua/{id}', 'NhanKhauController@postSua');

        Route::get('xoa/{id}', 'NhanKhauController@getXoa');

        Route::post('timkiem', 'NhanKhauController@timkiem');

        Route::post('diachi', 'NhanKhauController@loc_diachi');

        Route::get('chitiet/{id}', 'NhanKhauController@chitiet');
    });

    Route::group(['prefix' => 'thongke'], function(){
        Route::get('/', 'ThongKeController@thongke');
        Route::get('chitiet/{id}', 'ThongKeController@chitiet');
    });

    Route::group(['prefix'=>'user'], function(){
        //admin/user/...
        Route::get('', 'UserController@getDanhSach');

        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');
        
        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');

        Route::get('xoa/{id}', 'UserController@getXoa');
    });

    Route::group(['prefix'=>'yeucau'], function(){
        //admin/yeucau/...
        Route::get('', 'YeuCauController@getDanhSach');
        Route::get('nhankhau', 'YeuCauController@yeucaunk');
        Route::get('xoa/{id}', 'YeuCauController@getXoa');
    });

    Route::group(['prefix' => 'ajax'], function(){
        //Lấy thôn xóm theo xã phường
        Route::get('thonxom/{idXaPhuong}', 'AjaxController@getThonXom');
        
    });
    
});

Route::get('trangchu', 'PagesController@trangchu');
Route::get('hokhau', 'PagesController@hokhau');
Route::get('nhankhau', 'PagesController@nhankhau');
Route::get('yeucau', 'PagesController@yeucau');
Route::post('yeucau', 'PagesController@guiyeucau');
Route::get('dangxuat', 'PagesController@dangxuat');

Route::get('editAccount', 'PagesController@getEdit');
Route::post('editAccount', 'PagesController@postEdit');

