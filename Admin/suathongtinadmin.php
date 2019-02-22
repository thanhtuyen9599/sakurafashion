<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php
	if(isset($_GET["maSp"]))
	{
		$maSp=$_GET["maSp"];
		//b1:mo ket noi:
			include("../ConnectDb/open.php");
		//b2:thao tac lay sp ve
		$sql="select * from tblsanpham where maSp='$maSp'";
		$result=mysqli_query($con,$sql);
		$sp=mysqli_fetch_array($result);
		?>
        <form action="suathongtinspprocess.php">
        	Mã SP:<input type="text" name="txtma" value="<?php echo($sp["maSp"]);?>" readonly="readonly"/><br />
            Tên SP:<input type="text" name="txtten" value="<?php echo($sp["tenSp"]);?>"/><br />
            Ảnh:<input type="text" name="txtanh" value="<?php echo($sp["anh"]);?>"/><br />
            Giá:<input type="text" name="txtgia" value="<?php echo($sp["gia"]);?>"/>
			<?php
			//b3:dong ket noi
            include("../ConnectDb/close.php");
            ?>
            </select><br />
            <input type="submit" value="Cập nhật" />
        </form>
        <?php
	}else
	{
		header("Location:quanlysanpham.php");	
	}
	?>
</body>
</html>