<?php
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
	//tien hanh xoa
	//b1:mo ket noi
		include ("../ConnectDb/open.php");
	//b2:thao tac xoa
		//b2.1:viet cau query
		$sql="delete from tintuc where id='$id'";
		//b2.2:chay cau query
		mysqli_query($con,$sql);
	//b3:dong ket noi
		include ("../ConnectDb/close.php");
	header("Location:quanlytintuc.php");
}else
{
	header("Location:quanlytintuc.php");	
}
?>