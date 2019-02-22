<?php
if(isset($_GET["txtMa"])&&isset($_GET["txtTen"])&&isset($_GET["txtName"])&&isset($_GET["ngaysinh"])&&isset($_GET["gioitinh"])&&isset($_GET["sdt"])&&isset($_GET["diachi"])&&isset($_GET["email"]))
{
	$makh=$_GET["txtMa"];
	$user=$_GET["txtTen"];
	$tenkh=$_GET["txtName"];
	$ngaysinh=$_GET["ngaysinh"];
	$gioitinh=$_GET["gioitinh"];
    $sdt=$_GET["sdt"];
    $diachi=$_GET["diachi"];
    $email=$_GET["email"];
	//mo ket noi
	include("../ConnectDb/open.php");
	$sql="update tblkhachhang set userName='$user',tenKh='$tenkh',ngaySinh='$ngaysinh',gioiTinh=$gioitinh,sdt='$sdt',diaChi='$diachi',email='$email' where maKh=$makh";
	echo($sql);
	mysqli_query($con,$sql);
    include("../ConnectDb/close.php");
    header("Location:ttkhachhang.php");
}else
{
	header("Location:ttkhachhang.php");	
}
?>