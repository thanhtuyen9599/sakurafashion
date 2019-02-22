<?php
session_start();
	if(!isset($_SESSION["userName"]))
	{
		//chua login thi phai login da
		header("Location:login.php");	
	}
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
			<script src="themes/js/respond.min.js"></script>
		<![endif]-->
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
			<?php
			include("../includes/homepage_slider.php");
			?>
			<section class="header_text sub">
			<img class="pageBanner" src="../themes/images/pageBanner.png" alt="New products" >
				<h4><span>Shopping Cart</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>Giỏ </strong> hàng</span></h4>
						<?php 
							$tongTien=0;
							if(isset($_SESSION['gioHang'])){		
						?>
						<table class="table table-striped text-center">
							<thead>
								<tr>

									<th>Mã sp</th>
									<th>Ảnh</th>
									<th>Tên sp</th>
									<th>Số lượng</th>
									<th>Giá</th>
									<th colspan="2" style="text-align:center">Tùy Chọn</th>
									<?php
										$gioHang=$_SESSION['gioHang'];
										foreach($gioHang as $maSp=>$soLuong)
										{
											include("../ConnectDb/open.php");
											$result=mysqli_query($con,"select * from tblsanpham where maSp=$maSp");
											$sp=mysqli_fetch_array($result);
											include("../ConnectDb/close.php");	
										?>
								</tr>
							</thead>
							<tbody>
								<tr>
								<td><?php echo($sp["maSp"]);?></td>
									<td><a href="chitietsanpham.php"><img alt="" height="42" width="42"src="<?php echo($sp["anh"]);?>"></a></td>
									<td><?php echo($sp["tenSp"]);?></td>
									<form action="capNhatGioHang.php?action=update&id=<?php echo($sp['maSp']);?>" method="post">
									<td><input type="number"class="input-mini" name="soluong" value="<?php echo($soLuong);?>"/></td>
									<td><?php echo($sp["gia"]);?></td>
									
									<td style="text-align:center;padding-left:0"><input type="submit" name="xoa" value="Xóa"/ class="btn" /></td>
									<td style="text-align:center;padding-left:0"><input type="submit" name="update" value="Cập Nhật"class="btn" /></td>
									</form>
                            	</tr>
								<?php
									$tongTien+=$soLuong*$sp["gia"];
								}
								}
							else {
								echo("Giỏ Hàng Chưa Có Sản Phẩm");
							}
								?>	  
							</tbody>
						</table>
						<hr>
						<div> Tổng tiền:  <?php echo($tongTien);?> đ</div>
						<p class="buttons center">				
							<a class="btn" href="xoatatcagiohang.php">Xóa Tất Cả</a>
							<a class="btn" href="sanpham.php">Tiếp tục</a>
							
						</p>
						<hr/>
						<hr/>
						<?php
								if(isset($_SESSION["userName"]))
								{
								$user=$_SESSION["userName"];
								include("../ConnectDb/open.php");
								$result=mysqli_query($con,"select * from tblkhachhang where userName='$user'");
								$khachHang=mysqli_fetch_array($result);
								?>
								<form action="datHangProcess.php" method="post">
									<input type="hidden" name="txtMa" value="<?php echo($khachHang["maKh"])?>" />
									<input type="hidden" name="txtTongTien" value="<?php echo($tongTien);?>" />
									<table>
										<tr>
											<td>Tên người nhận</td>
											<td><input type="text" name="txtTen" value="<?php echo($khachHang["tenKh"]);?>"/></td>
										</tr>
								    	<tr>	
											<td>Địa chỉ nhận</td>
											<td><input type="text" name="txtDiaChi" value="<?php echo($khachHang["diaChi"]);?>" /></td>
										</tr>
										<tr>
											<td>Số điện thoại</td>
											<td><input type="text" name="txtSdt" value="<?php echo($khachHang["sdt"]);?>" /></td>
										</tr>
									</table>
									<button class="btn btn-inverse" type="submit" id="checkout">Đặt hàng</button>
									</form>
								<?php
									include("../ConnectDb/close.php");
									}	
								?>
								<hr/>				
					</div>
						<div class="block">
							<h4 class="title">
							</h4>
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner">
									<div class="active item">
									</div>
									<div class="item">
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</section>			
			<?php
				include("../includes/footer_bar.php");
			?>
		</div>
		<script src="../themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "datHangProcess.php";
				})
			});
		</script>		
    </body>
</html>