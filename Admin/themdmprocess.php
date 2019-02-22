<?php
if(isset($_GET["txtTen"]))
{
	$ten=$_GET["txtTen"];
	//tien hanh them
	//b1:mo ket noi
	include("../ConnectDb/open.php");
	//b2:thao tac them
		$sql="insert into danhmuc(ten) values('$ten')";
		mysqli_query($con,$sql);
	//b3:dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlydanhmuc.php");
}else
{
	header("Location:quanlydanhmuc.php");	
}
?>