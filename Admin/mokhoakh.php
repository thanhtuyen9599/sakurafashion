<?php
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
	//tien hanh xoa
	//b1:mo ket noi
		include ("../ConnectDb/open.php");
	//b2:thao tac xoa
		//b2.1:viet cau query
		// $sql="delete from tblkhachhang where maKh='$id'";
		$sql="update tblkhachhang set khoa=0 where maKh='$id'";
		//b2.2:chay cau query
		mysqli_query($con,$sql);
	//b3:dong ket noi
		include ("../ConnectDb/close.php");
	header("Location:quanlykhachhang.php");
}else
{
	header("Location:quanlykhachhang.php");	
}
?>