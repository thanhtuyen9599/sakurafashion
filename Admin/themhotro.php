<?php
if(isset($_POST["name"])&&isset($_POST["phone"])&&isset($_POST["email"])&&isset($_POST["subject"])&&isset($_POST["content"]))
{
	$name=$_POST["name"];
	$phone=$_POST["phone"];
	$email=$_POST["email"];
	$subject=$_POST["subject"];
	$content=$_POST["content"];
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