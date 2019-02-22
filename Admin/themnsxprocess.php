<?php
if(isset($_GET["txtTen"])&&isset($_GET["txtDiachi"])&&isset($_GET["txtSdt"]))
{
	$ten=$_GET["txtTen"];
	$add=$_GET["txtDiachi"];
	$sdt=$_GET["txtSdt"];
	//tien hanh them
	//b1:mo ket noi
	include("../ConnectDb/open.php");
	//b2:thao tac them
		$sql="insert into tblnsx(tenNsx,diaChi,sdt) values('$ten','$add','$sdt')";
		mysqli_query($con,$sql);
	//b3:dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlynsx.php");
}else
{
	header("Location:quanlynsx.php");	
}
?>