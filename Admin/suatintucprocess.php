<?php
if(isset($_GET["id"])&& isset($_GET["anh"])&&isset($_GET["date"])&&isset($_GET["tieude"])&&isset($_GET["mota"])&&isset($_GET["noidung"]))
{
	$id=$_GET["id"];
	$anh=$_GET["anh"];
	$date=$_GET["date"];
	$tieude=$_GET["tieude"];
	$mota=$_GET["mota"];
	$noidung=$_GET["noidung"];
	//mo ket noi
	include("../ConnectDb/open.php");
	$sql="update tintuc set anh='$anh',ngayDangbai='$date',tieuDe='$tieude',moTa='$mota',noiDung='$noidung' where id='$id'";
	mysqli_query($con,$sql);
	//dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlytintuc.php");	
}else
{
	header("Location:quanlytintuc.php");	
}
?>