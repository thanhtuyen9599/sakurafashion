<?php
if(isset($_GET["anh"])&&isset($_GET["date"])&&isset($_GET["tieude"])&&isset($_GET["mota"])&&isset($_GET["noidung"]))
{
	$anh=$_GET["anh"];
	$date=$_GET["date"];
	$tieude=$_GET["tieude"];
	$mota=$_GET["mota"];
	$noidung=$_GET["noidung"];
	//tien hanh them
	//b1:mo ket noi
	include("../ConnectDb/open.php");
	//b2:thao tac them
		$sql="insert into tintuc(anh,ngayDangbai,tieuDe,moTa,noiDung) values('$anh','$date','$tieude','$mota','$noidung')";
		mysqli_query($con,$sql);
	//b3:dong ket noi
	include("../ConnectDb/close.php");
	echo($dob);
}else
{
	header('Location:quanlytintuc.php');
}
?>