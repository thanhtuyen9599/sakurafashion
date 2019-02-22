<?php
session_start();
	if(isset($_SESSION["userName"]))
	{
		//da dang nhap roi,khong can dang nhap lai nua, vao truc tiep trang chu
		header("Location:../index.php");		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sakurafashion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="bootstrap/bimages/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../bootstrap/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../bootstrap/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/util.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/main.css">
<!--===============================================================================================-->
<script>
	function validate(){
		//b1:lay tat ca du lieu ve
		var user=document.getElementById("txtUser").value;
		var pass=document.getElementById("txtPass").value;
		//b2:lay tat ca the hien thi loi ve
		var errUser=document.getElementById("errUser");
		var errPass=document.getElementById("errPass");
		//b3:xay dung bieu thuc chinh quy
		var regUser=/^[a-zA-Z0-9_]+$/;
		var regPass=/^[a-zA-Z0-9@]+$/;
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
		//b5:kiem tra ket qua, neu ok thi day du lieu len server	
		if(dem==2)
		{
			document.getElementById("login").submit();	
		}
	}
</script>
</head>
<body>
<?php
	if(isset($_GET["err"]))
	{
		echo"Try again!";	
	}
	$user="";
	$pass="";
	if(isset($_COOKIE["userName"])&&isset($_COOKIE["passWord"]))
	{
		$user=$_COOKIE["userName"];
		$pass=$_COOKIE["passWord"];
	}
?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" id="login" action="loginProcess.php" method="post">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="txtUser" value="<?php echo($user);?>" placeholder="Username">
						<span class="focus-input100" id="errUser"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="txtPass" value="<?php echo($pass);?>" placeholder="Password">
						<span class="focus-input100" id="errPass"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							<input type="checkbox" name="ckbDangNhap" value="1" <?php if($user!=""){?> checked="checked" <?php }?>/>
						</span>
						<a href="#" class="txt2"></a>
						<span class="txt1">Ghi Nhớ Đăng Nhập</span>
					</div>

					<div class="container-login100-form-btn">
					<input type="submit" value="login" class="login100-form-btn" onclick="validate()"/>
					</div>
					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>
						<a href="dangki.php" title="Đăng kí">Đăng kí
						<a href="doiMatKhau.php" title="Đổi mật khẩu">Đổi mật khẩu
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>