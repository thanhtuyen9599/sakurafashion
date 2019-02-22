<?php
if(isset($_GET["txtma"])&&isset($_GET["txtten"])&&isset($_GET["danhmuc"]))
{
	$ma=$_GET["txtma"];
	$ten=$_GET["txtten"];
	$danhmuc=$_GET["danhmuc"];
	//mo ket noi
	include("../ConnectDb/open.php");
	$sql="update tblloaisp set tenLoaisp='$ten',ma='$danhmuc' where maLoaisp='$ma'";
	mysqli_query($con,$sql);
	//dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlyloaisanpham.php");	
}else
{
	header("Location:quanlyloaisanpham.php");	
}
?>