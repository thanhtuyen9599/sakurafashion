<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sakurafashion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="../themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="../themes/css/flexslider.css" rel="stylesheet"/>
		<link href="../themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="../themes/js/jquery-1.7.2.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>				
		<script src="../themes/js/superfish.js"></script>	
		<script src="../themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<style>
			.table {
				margin:auto;height:50%;width:50%;
			}
			td.left{
				text-align:center;
			}
		</style>
	</head>
<body>
<?php
		$tenSp="";
		if(isset($_POST["txtTen"]))
		{
			$tenSp=$_POST["txtTen"];	
		}
		?>
	<?php
		include("../includes/header.php");
		?>
		<div id="wrapper" class="container">
			<?php
				include("../includes/menu.php");
			?>
			<section class="header_text sub">
			<img class="pageBanner" src="../themes/images/pageBanner.png" alt="New products" >
				<h4><span></span></h4>
			</section>
	<?php
	if(isset($_GET["maKh"]))
	{
		$maKh=$_GET["maKh"];
		//b1:mo ket noi:
		include("../ConnectDb/open.php");
		//b2:thao tac lay sv ve
		$sql="select * from tblkhachhang where maKh=$maKh";
		$result=mysqli_query($con,$sql);
		$kh=mysqli_fetch_array($result);
		//b3:dong ket noi
		?>
        <form action="suaKhProcess.php">
			<table border="1" cellspacing="0" cellpadding="0" class="table">
				<tr>
					<td class="left">Mã Kh</td>
					<td><input type="text" name="txtMa" value="<?php echo($kh["maKh"]);?>" readonly="readonly"/></td>
				</tr>
				<tr>
					<td>Tên đăng nhập</td>
					<td><input type="text" name="txtTen" value="<?php echo($kh["userName"]);?>"/></td>
				</tr>
				<tr>
					<td>Tên khách hàng</td>
					<td><input type="text" name="txtName" value="<?php echo($kh["tenKh"]);?>"/></td>
				</tr>
				<tr>
					<td>Ngày sinh</td>
					<td><input type="date" name="ngaysinh" value="<?php echo($kh["ngaySinh"]);?>"/></td>
				</tr>
				<tr>
					<td>Giới tính</td>
					<td><input type="radio" name="gioitinh"  value="1" <?php if($kh["gioiTinh"]==1){?> checked="checked"<?php }?>/>Nam<input type="radio" name="gioitinh" value="0" <?php if($kh["gioiTinh"]==0){?> checked="checked"<?php }?>/>Nữ<br /></td>
				</tr>

				<tr>
					<td>Số điện thoại</td>
					<td><input type="text" name="sdt" value="<?php echo($kh["sdt"]);?>"/></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td><input type="text" name="diachi" value="<?php echo($kh["diaChi"]);?>"/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo($kh["email"]);?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Cập nhật" /></td>
				</tr>
			<?php
			include("../ConnectDb/close.php");
            ?>
			</table>
        </form>
        <?php
	}else
	{
		header("Location:ttkhachhang.php");	
	}
	include("../includes/footer_bar.php");
	?>
</body>
</html>