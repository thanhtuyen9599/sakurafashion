<?php
if(isset($_GET["name"])&&isset($_GET["phone"])&&isset($_GET["email"])&&isset($_GET["subject"])&&isset($_GET["content"]))
{
	$name=$_GET["name"];
	$phone=$_GET["phone"];
	$email=$_GET["email"];
	$subject=$_GET["subject"];
	$content=$_GET["content"];
	//tien hanh them
	//b1:mo ket noi
	include("../ConnectDb/open.php");
	//b2:thao tac them
		$sql="insert into hotro(ten,sdt,email,tieuDe,noiDung) values('$name','$phone','$email','$subject','$content')";
		mysqli_query($con,$sql);
	//b3:dong ket noi
	include("../ConnectDb/close.php");
	header('Location:../index.php');
}else
{
	header('Location:../index.php');
}
?>