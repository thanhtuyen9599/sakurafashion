<?php
	session_start();
	include("ConnectDb/open.php");
	$user=$_POST['txtUser'];
	$passOld = $_POST['txtPassOld'];
	$passNew= $_POST['txtPassNew'];
	$passAgain = $_POST['txtPassAgain'];
	// kiem tra passOld dung hay sai ;
	$_SESSION['userName']=$user;
	$sql = "select * from tblkhachhang where userName='$user' and passWord='$passOld'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){ 
		// neu passOld dung thi update lai pass
		$sql1= "update tblkhachhang set passWord='$passNew' where userName='$user'";
		mysqli_query($con,$sql1);
		echo'<script>
		alert("Đổi mật khẩu thành công!");
		window.location.href="../index.php";
		</script>';
	}else{
		echo'<script>
		alert("Mật khẩu bạn nhập sai!");
		window.location.href="doiMatKhau.php";
		</script>';
	}
	?>