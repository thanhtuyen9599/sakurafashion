<?php
if(isset($_GET["txtuser"])&&isset($_GET["txtpass"])&&isset($_GET["txtanh"])&&isset($_GET["txtten"])&&isset($_GET["txtdob"])&&isset($_GET["rdbGt"])&&isset($_GET["txtemail"])&&isset($_GET["txtsdt"])&&isset($_GET["txtquyen"]))
{
	$user=$_GET["txtuser"];
	$pass=$_GET["txtpass"];
	$anh=$_GET["txtanh"];
	$ten=$_GET["txtten"];
	$dob=$_GET["txtdob"];
	$gt=$_GET["rdbGt"];
	$email=$_GET["txtemail"];
	$sdt=$_GET["txtsdt"];
	$quyen=$_GET["txtquyen"];
	//tien hanh them
	//b1:mo ket noi
	include("../ConnectDb/open.php");
	//b2:thao tac them
		$sql="insert into tbladmin(userName,passWord,anh,ten,ngaySinh,gioiTinh,email,sdt,phanQuyen) values('$user','$pass','$anh','$ten','$dob','$gt','$email','$sdt',$quyen)";
		mysqli_query($con,$sql);
	//b3:dong ket noi
	include("../ConnectDb/close.php");
		header("Location:quanlyadmin.php");

}else
{
		header("Location:quanlyadmin.php");
}
?>