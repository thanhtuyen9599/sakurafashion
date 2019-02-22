<?php
if(isset($_GET["txtma"])&&isset($_GET["txtuser"])&&isset($_GET["txtpass"])&&isset($_GET["txtanh"])&&isset($_GET["txtten"])&&isset($_GET["txtadd"])&&isset($_GET["txtsdt"])&&isset($_GET["rdbGt"])&&isset($_GET["txtdob"])&&isset($_GET["txtemail"]))
{
	$id=$_GET["txtma"];
	$user=$_GET["txtuser"];
	$pass=$_GET["txtpass"];
	$ten=$_GET["txtten"];
	$add=$_GET["txtadd"];
	$sdt=$_GET["txtsdt"];
	$gt=$_GET["rdbGt"];
	$dob=$_GET["txtdob"];
	$email=$_GET["txtemail"];
	//mo ket noi
	include("../ConnectDb/open.php");
	$sql="update tblkhachhang set userName='$user',passWord='$pass',anh='$anh',ten='$ten',diaChi='$add',sdt='$sdt',gioiTinh='$gt',ngaySinh='$dob',email='$email' where maKh='$id'";
	mysqli_query($con,$sql);
	//dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlykhachhang.php");	
}else
{
	header("Location:quanlykhachhang.php");	
}
?>