<?php
if(isset($_GET["txtma"])&&isset($_GET["txtten"])&&isset($_GET["anh"])&&isset($_GET["gia"])&&isset($_GET["sl"])&&isset($_GET["nsx"])&&isset($_GET["lsp"]))
{
	$ma=$_GET["txtma"];
	$ten=$_GET["txtten"];
	$anh=$_GET["anh"];
	$gia=$_GET["gia"];
	$sl=$_GET["sl"];
	$nsx=$_GET["nsx"];
	$lsp=$_GET["lsp"];
	//mo ket noi
	include("../ConnectDb/open.php");
	$sql="update tblsanpham set tenSp='$ten',anh='$anh',gia='$gia',soLuong='$sl',maNsx='$nsx',maLoaisp='$lsp' where maSp='$ma'";
	mysqli_query($con,$sql);
	//dong ket noi
	include("../ConnectDb/close.php");
	header("Location:quanlysanpham.php");	
}else
{
	header("Location:quanlysanpham.php");	
}
?>