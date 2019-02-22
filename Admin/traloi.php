<?php
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
	//tien hanh xoa
	//b1:mo ket noi
		include ("../ConnectDb/open.php");
	//b2:thao tac xoa
		//b2.1:viet cau query
		// $sql="delete from tbladmin where maTK='$maid'";
		$sql = "update hotro set ghiChu=1 where id='$id'";
		//b2.2:chay cau query
		mysqli_query($con,$sql);
	//b3:dong ket noi
		include ("../ConnectDb/close.php");
	header("Location:quanlyhotro.php");
}else
{
	header("Location:quanlyhotro.php");	
}
?>