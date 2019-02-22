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
		<link href="../themes/css/main.css" rel="stylesheet"/>
		<link href="../themes/css/jquery.fancybox.css" rel="stylesheet"/>
		<link href="../themes/css/flexslider.css" rel="stylesheet"/>
				
		<!-- scripts -->
		<script src="../themes/js/jquery-1.7.2.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>				
		<script src="../themes/js/superfish.js"></script>	
		<script src="../themes/js/jquery.scrolltotop.js"></script>
		<script src="../themes/js/jquery.fancybox.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
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
			
			include("../includes/homepage_slider.php");
			?>
			<section class="header_text sub"><link href="../themes/css/flexslider.css" rel="stylesheet"/>
			<img class="pageBanner" src="../themes/images/pageBanner.png" alt="New products" >
				<h4><span>Chi tiết sản phẩm</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
							<?php
								if(isset($_GET["maSp"]))
								{
									$maSp=$_GET["maSp"];	
									include("../ConnectDb/open.php");
									$result=mysqli_query($con,"select * from tblsanpham where maSp=$maSp");
									$sp=mysqli_fetch_array($result);
							?>
								<a href="<?php echo($sp['anh'])?>" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="<?php echo($sp['anh'])?>"></a>
							</div>
							<div class="span5">
								<address>
									<strong>Mã sản phẩm :</strong> <span><?php echo($sp["maSp"]);?></span><br/><br/>
									<strong>Tên sản phẩm :</strong> <span><?php echo($sp["tenSp"]);?></span><br/><br/>
									<strong>Giá :</strong> <span><?php echo number_format($sp["gia"]);?></span><br><br/>
									<strong>Mô tả :</strong> <span><?php echo($sp["moTa"]);?></span><br><br/>
									<strong>Tình trạng :</strong> <span><?php if($sp['soLuong']<0) echo "ngưng bán";else if($sp['soLuong']==0) echo "hết hàng";else echo "còn hàng";?></span><br><br/>
															
								</address>
								<?php
									}
									// else
									// {
									// 	header("Location:sanpham.php");	
									// }
									?>
							</div>
							<div class="span5">
								<form class="form-inline">
									<p>&nbsp;</p>
									<a class="btn btn-inverse" href="capNhatGioHang.php?action=add&id=<?php echo($maSp);?>">Thêm sản phẩm vào giỏ hàng</a>
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span9">				 
								<div class="tab-content">
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">	
											<tbody>
											</tbody>
										</table>
									</div>
								</div>							
							</div>						
							<div class="span9">	
								<br>
								<h4 class="title">
								</h4>
								<div id="myCarousel-1" class="carousel slide">
									<div class="carousel-inner">
									</div>
								</div>
							</div>
						</div>
					</div>
			</section>			
			<?php
				include("../includes/footer_bar.php")
			?>
		</div>
		<script src="../themes/js/common.js"></script>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
		<?php
		include("../ConnectDb/close.php");
		?>
    </body>
</html>