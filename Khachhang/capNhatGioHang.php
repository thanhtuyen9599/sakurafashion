<?php
session_start();
if(isset($_POST["arrSl"]))
{
	$arrSl=array();
	$arrSl=$_POST["arrSl"];
	$gioHang=$_SESSION["gioHang"];
	$dem=0;
	foreach($gioHang as $maSp=>$soLuong)
	{
		$_SESSION["gioHang"][$maSp]=$arrSl[$dem];
		$dem++;	
	}
	header("Location:giohang.php");	
}
if(isset($_GET["action"])){
	if($_GET["action"]=="add"){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$_SESSION['gioHang'][$id]=1;
		}
	}
	if($_GET["action"]=="update"){
		$id=$_GET['id'];
		if(isset($_GET['id'])){
			if(isset($_POST['update'])){
				$_SESSION['gioHang'][$id]=$_POST['soluong'];
			}
			if(isset($_POST['xoa'])){
				unset($_SESSION['gioHang'][$id]);
			}
		}
	}
}
header("Location:giohang.php");
?>