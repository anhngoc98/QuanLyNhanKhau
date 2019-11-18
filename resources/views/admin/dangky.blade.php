<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Đăng Ký</title>
<base href="{{asset('')}}">
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="dashboard/css/font-awesome_1.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="dashboard/css/style_login.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link href="dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="dashboard/js/jquery.min.js"></script>

<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
		<!--header-->
		<div class="header-w3l">
			<h1 style="margin: 30px 0 20px 0">Quản lý nhân khẩu</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo" style="padding-top:15px">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2 style="margin-bottom: 20px">Tạo Tài Khoản Mới</h2>
                            <form action="dangky" method="post">
                                {{csrf_field()}}
                                <!-- <div style="position:relative;width:200px;height:25px;border:0;padding:0;margin:0;">
                                    <div class="cmbNhanKhau">
                                    <select style="position:absolute;top:0px;left:0px;width:200px; height:25px;line-height:20px;margin:0;padding:0;"
                                        onchange="document.getElementById("displayValue").value=this.options[this.selectedIndex].text; document.getElementById("idValue").value=this.options[this.selectedIndex].value;">
										@foreach($nhankhau as $nk)
											<option value="{{$nk->id}}">{{$nk->MaNhanKhau}}</option>
										@endforeach	
									</select>    
                                    </div>
                                    <input type="text" name="displayValue" id="displayValue" onkeyup="LoadCombobox(this.value)" 
                                            placeholder="add/select a value" onfocus="this.select()"
                                            style="position:absolute;top:0px;left:0px;width:183px;width:180px\9;#width:180px;height:23px; height:21px\9;#height:18px;border:1px solid #556;"  >
                                    <input name="idValue" id="idValue" type="hidden">
                                </div> -->
                                <div class="form-sub-w3">
									<input type="text" name="MaNK" placeholder="Nhập mã nhân khẩu" required="" autofocus/>
                                    <div class="icon-w3">
                                        <i class="fa fa-codepen" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="form-sub-w3">
									<input type="text" name="phone" placeholder="Số điện thoại " required="">
                                    <div class="icon-w3">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
								</div>
								<div class="form-sub-w3">
									<input type="text" name="username" placeholder="Tên đăng nhập " required="">
                                    <div class="icon-w3">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="password" placeholder="Mật khẩu" required="" />
									<div class="icon-w3">
										<i class="fa fa-unlock-alt" aria-hidden="true"></i>
									</div>
                                </div>
                                <div class="form-sub-w3">
									<input type="password" name="passwordAgain" placeholder="Nhập lại mật khẩu" required="" />
									<div class="icon-w3">
										<i class="fa fa-unlock-alt" aria-hidden="true"></i>
									</div>
								</div>
								@if(session('thongbao'))
									<p style="color:#66ff33">
										{{session('thongbao')}}
									</p>
                        		@endif
								@if(session('error'))
									<p style="color:#ff704d">
										{{session('error')}}
									</p>
								@endif
								@if(count($errors) > 0)
									<div style="color:#ff704d">
										@foreach($errors->all() as $err)
											{{$err}}<br>
										@endforeach
									</div>
								@endif
								<label class="anim">
								</label> 
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="submit" value="Đăng Ký">
								</div>
								<div class="register">
									<a href="/">Đăng Nhập</a>
								</div>
							</form>

						</div>
						
						
				<!--//form-ends-here-->

		</div>
        <!--//main-->
<script>
    function SelectedTextChange()
    {
        var x = $("#cmbNhanKhau option:selected").text();
        $("#displayValue").val(x);
    }

    function LoadCombobox(data = null)
    {
        $.ajax({
            url: "admin/ajax/dangky/"+data,
            type: "get",
            data: {id : data},
            success:function(result) {
                $('.cmbNhanKhau').html(result);
            }
        })
    }
</script>
</body>
</html>