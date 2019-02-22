<?php
if(isset($_GET["txtten"])&&isset($_GET["txtanh"])&&isset($_GET["txtgia"])&&isset($_GET["txtsl"])&&isset($_GET["nsx"])&&isset($_GET["lsp"]))
{
	$ten=$_GET["txtten"];
	$anh=$_GET["txtanh"];
	$gia=$_GET["txtgia"];
	$sl=$_GET["txtsl"];
	$nsx=$_GET["nsx"];
	$lsp=$_GET["lsp"];
	//tien hanh them
	//b1:mo ket noi
	include("../ConnectDb/open.php");
	//b2:thao tac them
		$sql="insert into tblsanpham(tenSp,anh,gia,soLuong,maNsx,maLoaisp) values('$ten','$anh','$gia','$sl','$nsx','$lsp')";
		mysqli_query($con,$sql);
	//b3:dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlysanpham.php");
}else
{
	header("Location:quanlysanpham.php");	
}
?>