<?php
if(isset($_GET["txtma"])&&isset($_GET["txtten"])&&isset($_GET["txtadd"])&&isset($_GET["txtsdt"]))
{
	$ma=$_GET["txtma"];
	$ten=$_GET["txtten"];
	$add=$_GET["txtadd"];
	$sdt=$_GET["txtsdt"];
	//mo ket noi
	include("../ConnectDb/open.php");
	$sql="update tblnsx set tenNsx='$ten',diaChi='$add',sdt='$sdt' where maNsx='$ma'";
	mysqli_query($con,$sql);
	//dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlynsx.php");	
}else
{
	header("Location:quanlynsx.php");	
}
?>