<?php
session_start();
if(isset($_POST["txtUser"])&&isset($_POST["txtPass"]))
{
	$user=$_POST["txtUser"];
	$pass=$_POST["txtPass"];
	include("../ConnectDb/open.php");
	$result=mysqli_query($con,"select * from tblkhachhang where userName='$user' and passWord='$pass'");
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
			setcookie("userName",$user,time()+(86400*30));
			setcookie("passWord",$pass,time()+(86400*30));
		}else
		{
			setcookie("userName",$user,time()-100);
			setcookie("passWord",$pass,time()-100);
		}
	
		//quay ve trang chu khi login thanh cong
		header("Location:../index.php");	
	}
  }else
{
	header("Location:login.php");	
}
?>