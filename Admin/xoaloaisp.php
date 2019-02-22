<?php
if(isset($_GET["id"]))
{
	$maLoai=$_GET["id"];
	//tien hanh xoa
	//b1:mo ket noi
		include ("../ConnectDb/open.php");
	//b2:thao tac xoa
		$sql="delete from tblloaisp where maLoaisp='$maLoai'";
		mysqli_query($con,$sql);
	//b3:dong ket noi
		include ("../ConnectDb/close.php");
	header("Location:quanlyloaisanpham.php");
}else
{
	header("Location:quanlyloaisanpham.php");	
}
?>