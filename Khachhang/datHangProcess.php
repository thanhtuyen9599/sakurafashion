<?php
session_start();
if(isset($_POST["txtTen"])&&isset($_POST["txtDiaChi"])&&isset($_POST["txtSdt"])&&isset($_POST["txtMa"])&&isset($_POST["txtTongTien"]))
{
	$ten=$_POST["txtTen"];
	$diaChi=$_POST["txtDiaChi"];
	$sdt=$_POST["txtSdt"];
	$maKh=$_POST["txtMa"];
	$tongTien=$_POST["txtTongTien"];
	include("../ConnectDb/open.php");
	//insert hoa don
	mysqli_query($con,"insert into tblhoadon(maKh,tenKhnhan,diaChinhan,sdtnhan,ngaydathang,tongTien,tinhTrang) values($maKh,'$ten','$diaChi','$sdt',now(),$tongTien,0)");
	//insert vao hoa don chi tiet	
	//maHd
	$result=mysqli_query($con,"select max(maHd) as maxMa from tblhoadon");
	$row=mysqli_fetch_array($result);
	$maHd=$row["maxMa"];
	$gioHang=array();
	$gioHang=$_SESSION["gioHang"];
	foreach($gioHang as $maSp=>$soLuong)
	{
		$resultSp=mysqli_query($con,"select * from tblsanpham where maSp=$maSp");
		$sp=mysqli_fetch_array($resultSp);
		$gia=$sp["gia"];
		mysqli_query($con,"insert into tblhoadonchitiet values($maHd,$maSp,$gia,$soLuong)");	
		echo("insert into tblhoadonchitiet values($maHd,$maSp,$gia,$soLuong)");
	}
	include("../ConnectDb/close.php");
	//xoa gio hang
	unset($_SESSION["gioHang"]);
		header("Location:sanpham.php");
}else{
	header("Location:sanpham.php");
}
?>