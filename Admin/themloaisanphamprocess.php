<?php
if(isset($_GET["txtTen"])&&isset($_GET["danhmuc"]))
{
	$ten=$_GET["txtTen"];
	$dm=$_GET["danhmuc"];
	//tien hanh them
	//b1:mo ket noi
	include("../ConnectDb/open.php");
	//b2:thao tac them
		$sql="insert into tblloaisp(tenLoaisp,ma) values('$ten','$dm')";
		mysqli_query($con,$sql);
	//b3:dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlyloaisanpham.php");
}else
{
	header("Location:quanlyloaisanpham.php");	
}
?>