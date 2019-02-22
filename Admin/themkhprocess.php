<?php
if(isset($_GET["txtuser"])&&isset($_GET["txtpass"])&&isset($_GET["txtanh"])&&isset($_GET["txtten"])&&isset($_GET["txtadd"])&&isset($_GET["txtsdt"])&&isset($_GET["rdbGt"])&&isset($_GET["txtdob"])&&isset($_GET["txtemail"]))
{
	$user=$_GET["txtuser"];
	$pass=$_GET["txtpass"];
	$anh=$_GET["txtanh"];
	$ten=$_GET["txtten"];
	$add=$_GET["txtadd"];
	$sdt=$_GET["txtsdt"];
	$gt=$_GET["rdbGt"];
	$dob=$_GET["txtdob"];
	$email=$_GET["txtemail"];
	//tien hanh them
	//b1:mo ket noi
	include("../ConnectDb/open.php");
	//b2:thao tac them
		$sql="insert into tblkhachhang(userName,passWord,anh,tenKh,diaChi,sdt,gioiTinh,ngaySinh,email) values('$user','$pass','$anh','$ten','$add',$sdt,'$gt','$dob','$email')";
		mysqli_query($con,$sql);
	//b3:dong ket noi
	include("../ConnectDb/close.php");
	echo($dob);
}else
{
	header('Location:quanlykhachhang.php');
}
?>