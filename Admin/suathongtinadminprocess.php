<?php
if(isset($_GET["txtma"])&&isset($_GET["txtten"])&&isset($_GET["txtanh"])&&isset($_GET["txtgia"]))
{
	$ma=$_GET["txtma"];
	$ten=$_GET["txtten"];
	$anh=$_GET["txtanh"];
	$gia=$_GET["txtgia"];
	//mo ket noi
	include("../ConnectDb/open.php");
	$sql="update tblsanpham set tenSp='$ten',anh='$anh',gia='$gia' where maSp='$ma'";
	mysqli_query($con,$sql);
	//dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlysanpham.php");	
}else
{
	header("Location:quanlysanpham.php");	
}
?>