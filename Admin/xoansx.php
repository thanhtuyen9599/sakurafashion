<?php
if(isset($_GET["id"]))
{
	$mansx=$_GET["id"];
	//tien hanh xoa
	//b1:mo ket noi
	include ("../ConnectDb/open.php");
	//b2:thao tac xoa
	$sql="delete from tblnsx where mansx='$mansx'";
	mysqli_query($con,$sql);
	//b3:dong ket noi
	include ("../ConnectDb/close.php");
	header("Location:quanlynsx.php");
}else
{
	header("Location:quanlynsx.php");	
}
?>