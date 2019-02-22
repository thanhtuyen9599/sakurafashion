<?php
session_start();
//luu maSp va so luong cua san pham do
	//tao gio hang
	if(isset($_GET["maSp"]))
	{
		$maSp=$_GET["maSp"];
		if(isset($_SESSION["gioHang"]))
		{
			//day la lan thu 2 tro di them sp vao gio hang
			if(isset($_SESSION["gioHang"][$maSp]))
			{
				//neu ton tai san pham nay trong gio hang
				//tang so luong len 1
				$_SESSION["gioHang"][$maSp]++;
			}else
			{
				//chua ton tai
				$_SESSION["gioHang"][$maSp]=1;	
			}
		}else
		{
			$_SESSION["gioHang"]=array();
			//nem san pham vao gio hang
			$_SESSION["gioHang"][$maSp]=1;
		}
		header("Location:sanpham.php");
	}
	header("Location:sanpham.php");
?>