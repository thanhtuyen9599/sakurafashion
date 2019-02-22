<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sakurafashion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="../themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="../themes/css/flexslider.css" rel="stylesheet"/>
		<link href="../themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="../themes/js/jquery-1.7.2.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>				
		<script src="../themes/js/superfish.js"></script>	
		<script src="../themes/js/jquery.scrolltotop.js"></script>
		<!-- [if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif] -->
		<script>
			function validate(){
				//lấy tất cả dữ liệu về
				var user=document.getElementById("user").value;
				var pass=document.getElementById("pass").value;
				var tenKh=document.getElementById("tenkh").value;
				var ngaysinh=document.getElementById("ngaysinh").value;
				var gioitinh=document.getElementsByName("gioitinh");
				var dienthoai=document.getElementById("sdt").value;
				var diachi=document.getElementById("diachi").value;
				var email=document.getElementById("email").value;
				//lấy tất cả thẻ hiển thị lỗi về
				var errUser=document.getElementById("errUser");
				var errPass=document.getElementById("errPass");
				var errTenkh=document.getElementById("errTen");
				var errNgaysinh=document.getElementById("errNgaysinh");
				var errGioitinh=document.getElementById("errGioitinh");
				var errSdt=document.getElementById("errSdt");
				var errDiachi=document.getElementById("errDiaChi");
				var errEmail=document.getElementById("errEmail");
				//b3: xay dung bieu thuc chinh quy
				var regUser=/^[a-zA-Z0-9_]+$/;
				var regPass=/^[a-zA-Z0-9]+$/;
				var regTenkh=/^[a-zA-Z]+$/;
				var regSdt=/^[0-9+]+$/;
				var regEmail=/^[a-zA-Z]+[a-zA-Z0-9_.]*@[A-Za-z0-9]+\.?[a-zA-Z]+\.[A-Za-z]{2,3}$/;
				//b4:tien hanh validate
				var dem=0;
				//user
				if(user.length==0)
				{
					errUser.innerHTML="*Không được để trống!";	
				}else
				{
					var kqUser=regUser.test(user);
					if(kqUser)
					{
						errUser.innerHTML="";
						dem++;		
					}else
					{
						errUser.innerHTML="*Không đúng định dạng!";		
					}
				}
				//pass
				if(pass.length==0)
				{
					errPass.innerHTML="*Không được để trống!";	
				}else
				{
					var kqPass=regPass.test(pass);
					if(kqPass)
					{
						errPass.innerHTML="";
						dem++;		
					}else
					{
						errPass.innerHTML="*Không đúng định dạng!";		
					}
				}
				//tenkh
				if(tenkh.length==0)
				{
					errTen.innerHTML="*Không được để trống!";	
				}else
				{
					var kqTen=regTen.test(tenkh);
					if(kqTen)
					{
						errTen.innerHTML="";	
						dem++;	
					}else
					{
						errTen.innerHTML="*Không đúng định dạng!";	
					}
				}
				//gioi tinh 
				var demGt=0;
				for(var i=0;i<gioitinh.length;i++)
				{
					if(gioitinh[i].checked)
					{
						demGt++;	
					}	
				}
				if(demGt==0)
				{
					errGioitinh.innerHTML="*Phải chọn giới tính!";	
				}else
				{
					errGioitinh.innerHTML="";
					dem++;			
				}
				//so dien thoai
				if(dienthoai.length==0)
				{
					errSdt.innerHTML="*Không được để trống!";
				}else
				{
					var kqDienThoai=regSdt.test(dienthoai);
					if(kqDienThoai)
					{
						errSdt.innerHTML="";	
						dem++;	
					}else
					{
						errSdt.innerHTML="*Không đúng định dạng!";	
					}
				//dia chi
				if(diachi.length==0)
				{
					errDiachi.innerHTML="*Không được để trống!";	
				}else
				{
					errDiachi.innerHTML="";
					dem++;			
				}
				}
				//email
				if(email.length==0)
				{
					errEmail.innerHTML="*Không được để trống!";	
				}else
				{
					var kqEmail=regEmail.test(email);
					if(kqEmail)
					{
						errEmail.innerHTML="";
						dem++;		
					}else
					{
						errEmail.innerHTML="*Không đúng định dạng!";	
					}
				}
				if(dem==7)
				{
					document.getElementById("dangki").submit();	
				}
			}
		</script>
	</head>
    <body>
	<?php
		$tenSp="";
		if(isset($_POST["txtTen"]))
		{
			$tenSp=$_POST["txtTen"];	
		}
		?>		
	<?php
		include("../includes/header.php");
		?>
		<div id="wrapper" class="container">
			<?php
				include("../includes/menu.php");
			?>
			<?php
			include("../includes/homepage_slider.php");
			?>

			<section class="header_text sub">
			<img class="pageBanner" src="../themes/images/pageBanner.png" alt="New products" >
				<h4><span>Chào mừng bạn đến với Sakurafashion</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<!-- <h4 class="title"><span class="text"><strong>Đăng </strong>nhập</span></h4>
						<form action="dangkiProcess.php" method="post" id="dangki">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Tên đăng nhập</label>
									<div class="controls">
										<input name="txtUser" type="text" placeholder="Nhập tên đăng nhập" id="username" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Mật khẩu</label>
									<div class="controls">
										<input name="txtPass" type="password" placeholder="Nhập mật khẩu" id="password" class="input-xlarge" >
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" value="Đăng nhập">
									<hr>
								</div>
							</fieldset>
						</form>				 -->
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Đăng </strong>kí</span></h4>
						<form action="dangkiProcess.php" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Tên đăng nhập</label>
									<div class="controls">
										<input type="text" placeholder="Nhập tên đăng nhập" required name="user" class="input-xlarge">
										<span id="errUser"></span>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Mật khẩu</label>
									<div class="controls">
										<input type="password" placeholder="Nhập mật khẩu" required name="pass" class="input-xlarge">
										<span id="errPass"></span>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Tên khách hàng</label>
									<div class="controls">
										<input type="text" placeholder="Nhập tên khách hàng" required name="tenkh"class="input-xlarge">
										<span id="errTen"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Ngày sinh</label>
									<div class="controls">
										<input type="date" required name="ngaysinh" class="input-xlarge">
										<span id="errNgaysinh"></span>
									</div>
								<div class="control-group">
									<label class="control-label">Giới tính</label>
									<div class="controls">
										<input type="radio" required name="gioitinh" value="0" class="input-xlarge">Nữ
										<input type="radio" required name="gioitinh" value="1" class="input-xlarge">Nam
										<span id="errGioitinh"></span>
									</div>
								<div class="control-group">
									<label class="control-label">Số điện thoại</label>
									<div class="controls">
										<input type="text" placeholder="Nhập số điện thoại" required name="sdt" class="input-xlarge"/>
										<span id="errSdt"></span>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Địa chỉ</label>
									<div class="controls">
										<input type="text" placeholder="Nhập địa chỉ" required name="diachi" class="input-xlarge"/>
										<span id="errDiachi"></span>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Email</label>
									<div class="controls">
										<input type="text" placeholder="Nhập email" required name="email" class="input-xlarge"/>
										<span id="errEmail"></span>
									</div>
								</div>							                  				
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Đăng kí" onclick="validate()"/></div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>			
			<?php
			include("../includes/footer_bar.php");
			?>
		</div>
    </body>
	<script src="../themes/js/common.js"></script>
</html>