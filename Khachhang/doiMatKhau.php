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
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
    <style type="text/css">
        .table{
            margin:auto; width:60%; height:200px; border:1px solid black;
        }
        th.left{
            text-align: center;
        }
    </style>
	<script>
		function validate(){
			//lấy tất cả dữ liệu về
		var user=document.getElementById("txtUser").value;
		var passold=document.getElementById("txtPassOld").value;
		var passnew=document.getElementById("txtPassNew").value;
		var passNhapLai=document.getElementById("txtPassAgain").value;
			//lấy tất cả thẻ hiển thị lỗi về
		var errTen=document.getElementById("errTen");
		var errPassold=document.getElementById("errMkcu");
		var errPassnew=document.getElementById("errMkm");
		var errPassagain=document.getElementById("errNhaplaipass");
			//xay dung bieu thuc chinh quy
		var regUser=/^[a-zA-Z0-9_]+$/;
		var regPass=/^[a-zA-Z0-9@]+$/;
			//tien hanh validate
		var dem=0;
		//user
		if(user.length==0)
		{
			errTen.innerHTML="*Không được để trống!";	
		}else
		{
			var kqUser=regUser.test(user);
			if(kqUser)
			{
				errTen.innerHTML="";
				dem++;		
			}else
			{
				errTen.innerHTML="*Không đúng định dạng";		
			}
		}
		//pass
		if(pass.length==0)
		{
			errPass.innerHTML="*Khong duoc de trong!";	
		}else
		{
			var kqPass=regPass.test(pass);
			if(kqPass)
			{
				errPass.innerHTML="";
				dem++;		
			}else
			{
				errPass.innerHTML="*Khong dung dinh dang!";		
			}
		}
		//nhap lai pass
		if(passNhapLai.length==0)
		{
			errPassNhapLai.innerHTML="*Khong duoc de trong!";	
		}else if(passNhapLai!=pass)
		{
			errPassNhapLai.innerHTML="*Khong Khop!";		
		}else
		{
			errPassNhapLai.innerHTML="";
			dem++;		
		}
		}
	</script>
    </head>
    <body>
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
			<h4><span></span></h4>
			</section>
    <form action="doiMatKhauProcess.php" method="post" id="changePass">
	    <table border="1" cellpadding="0" cellspacing="0" class="table">
            <tr>
        	    <th class="left">Tên đăng nhập</th>
                <td><input type="text" name="txtUser" /></td>
				<span id="errTen"></span>
            </tr>
    	    <tr>
        	    <th class="left">Mật khẩu cũ</th>
                <td><input type="password" name="txtPassOld" /></td>
				<span id="errMkcu"></span>
            </tr>
            <tr>
        	    <th class="left">Mật khẩu mới</th>
                <td><input type="password" name="txtPassNew" /></td>
				<span id="errMkmoi"></span>
            </tr>
            <tr>
        	    <th class="left">Nhập lại mật khẩu</th>
                <td><input type="password" name="txtPassAgain" /></td>
				<span id="errNhaplaipass"></span>
            </tr>
            <tr>
        	    <td></td>
        	    <td colspan="2"><input type="submit" value="Lưu thay đổi" class="input" onclick="validate()"/></td>
            </tr>
        </table>
    </form>
    <?php
		include("../includes/footer_bar.php");
	?>
    </body>
    </html>