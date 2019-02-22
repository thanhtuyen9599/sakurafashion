<?php
if(isset($_GET["id"]))
{
	$maid=$_GET["id"];
	//tien hanh xoa
	//b1:mo ket noi
		include ("../ConnectDb/open.php");
	//b2:thao tac xoa
		//b2.1:viet cau query
		// $sql="delete from tbladmin where maTK='$maid'";
		$sql = "update tbladmin set khoa=1 where maTK='$maid'";
		//b2.2:chay cau query
		mysqli_query($con,$sql);
	//b3:dong ket noi
		include ("../ConnectDb/close.php");
	header("Location:quanlyadmin.php");
}else
{
	header("Location:quanlyadmin.php");	
}
?>