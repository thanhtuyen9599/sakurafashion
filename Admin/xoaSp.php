<?php
if(isset($_GET["id"]))
{
	$maSp=$_GET["id"];
	//tien hanh xoa
	//b1:mo ket noi
		include ("../ConnectDb/open.php");
	//b2:thao tac xoa
		//b2.1:viet cau query
		$sql="delete from tblsanpham where maSp='$maSp'";
		//b2.2:chay cau query
		mysqli_query($con,$sql);
	//b3:dong ket noi
		include ("../ConnectDb/close.php");
	header("Location:quanlysanpham.php");
}else
{
	header("Location:quanlysanpham.php");	
}
?>