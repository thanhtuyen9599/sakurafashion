<?php
if(isset($_GET["id"]))
{
	$maKh=$_GET["id"];
	//tien hanh xoa
	//b1:mo ket noi
	include("../ConnectDb/open.php");
	//b2:thao tac xoa
		//b2.1:viet cau query
		$sql="delete from tblkhachhang where maKh=$maKh";
		//b2.2:chay cau query
		mysqli_query($con,$sql);
	//b3:dong ket noi
	include("../ConnectDb/close.php");
	header("Location:ttkhachhang.php");
}else
{
	header("Location:ttkhachhang.php");	
}
?>