<?php
if(isset($_GET["txtma"])&&isset($_GET["txtuser"])&&isset($_GET["txtpass"])&&isset($_GET["txtanh"])&&isset($_GET["txtten"])&&isset($_GET["txtdob"])&&isset($_GET["rdbGt"])&&isset($_GET["txtemail"])&&isset($_GET["txtsdt"]))
{
	$id=$_GET["txtma"];
	$user=$_GET["txtuser"];
	$pass=$_GET["txtpass"];
	$anh=$_GET["txtanh"];
	$ten=$_GET["txtten"];
	$dob=$_GET["txtdob"];
	$gt=$_GET["rdbGt"];
	$email=$_GET["txtemail"];
	$sdt=$_GET["txtsdt"];
	//mo ket noi
	include("../ConnectDb/open.php");
	$sql="update tbladmin set userName='$user',passWord='$pass',anh='$anh',ten='$ten',ngaySinh='$dob',gioiTinh='$gt',email='$email',sdt='$sdt' where maTK='$id'";
	mysqli_query($con,$sql);
	//dong ket noi
	include("../ConnectDb/close.php");
	header("Location:trangcanhan.php");	
}else
{
	header("Location:trangcanhan.php");	
}
?>