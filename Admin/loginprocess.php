<?php
session_start();
if(isset($_POST["txtUser"])&&isset($_POST["txtPass"]))
{
	$user=$_POST["txtUser"];
	$pass=$_POST["txtPass"];
	include("../ConnectDb/open.php");
	$result=mysqli_query($con,"select * from tbladmin where userName='$user' and passWord='$pass'");
	$demSoBanGhi=mysqli_num_rows($result);
	include("../ConnectDb/close.php");
	if($demSoBanGhi==0)
	{
		//login sai
		header("Location:login.php?err=1");	
	}else
	{
		//khi thanh cong phai luu tru trang thai login thanh cong
		$_SESSION["userName"]=$user;
		if(isset($_POST["ckbDangNhap"]))
		{
			//nghia la nguoi dung muon ghi nho dang nhap
			//luu user va pass len bo nho cookie
			setcookie("userName",$user,time()+(86400*30));
			setcookie("passWord",$pass,time()+(86400*30));
		}else
		{
			//nguoi dung khong muon ghi nho	
			//xoa ser va pass tren bo nho cookie di
			//expire
			setcookie("userName",$user,time()-100);
			setcookie("passWord",$pass,time()-100);
		}
		//quay ve trang ca nhan admin khi login thanh cong
		// if(isset($_SESSION["userName"]) and $_SESSION['phanQuyen'] < 3)
			// header("Location:Admin/trangcanhanadmin.php");
		// else if(isset($_SESSION["userName"]) and $_SESSION['phanQuyen'] == 3)
			// header("Location:Admin/trangcanhankhachhang.php");
		header("Location:trangcanhan.php");	
	}
}else
{
	header("Location:login.php");	
}
?>