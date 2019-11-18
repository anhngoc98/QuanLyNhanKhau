<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Đăng nhập</title>
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
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2>Đăng nhập</h2>
                            <form action="/" method="post">
                                {{csrf_field()}}
								<div class="form-sub-w3">
									<input type="text" name="username" placeholder="Tên đăng nhập " required="" autofocus/>
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
								@if(session('thongbao'))
									<p style="color:red">
										{{session('thongbao')}}
									</p>
                        		@endif
								<label class="anim">
								<input type="checkbox" class="checkbox">
									<span>Remember Me</span> 
									<a href="#">Forgot Password</a>
								</label> 
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="submit" value="Đăng nhập">
								</div>
								<div class="register">
									<a href="dangky">Đăng ký</a>
								</div>
							</form>

						</div>
						
						
				<!--//form-ends-here-->

		</div>
		<!--//main-->
</body>
</html>