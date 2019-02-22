<?php
if(isset($_GET["txtma"])&&isset($_GET["txtten"]))
{
	$ma=$_GET["txtma"];
	$ten=$_GET["txtten"];
	//mo ket noi
	include("../ConnectDb/open.php");
	$sql="update danhmuc set ten='$ten' where ma='$ma'";
	mysqli_query($con,$sql);
	//dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlydanhmuc.php");	
}else
{
	header("Location:quanlydanhmuc.php");	
}
?>