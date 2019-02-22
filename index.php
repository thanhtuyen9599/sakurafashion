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
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotopindex.js"></script>
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
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST">
						<input type="text" name="txtTen" value="<?php echo($tenSp);?>" class="input-block-level search-query" placeholder="Tìm kiếm sản phẩm"/>
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
			<ul>
							<li><a href="../index.php">Trang chủ</a></li>
							<li><a href="Khachhang/taikhoan.php">Tài khoản</a></li>	
				<li><a href="Khachhang/sanpham.php?maloai=1">Áo</a>					
					<ul>
						<li><a href="Khachhang/sanpham.php?loai=1">T-Shirt</a></li>
						<li><a href="Khachhang/sanpham.php?loai=2">Hoodie</a></li>
						<li><a href="Khachhang/sanpham.php?loai=3">Áo khoác</a></li>
					</ul>
				</li>															
				<li><a href="Khachhang/sanpham.php?maloai=2">Quần</a>					
					<ul>
						<li><a href="Khachhang/sanpham.php?loai=4">Quần jeans</a></li>
						<li><a href="Khachhang/sanpham.php?loai=5">Quần sooc</a></li>
					</ul>
				</li>
				<li><a href="Khachhang/sanpham.php?maloai=3">Váy đầm</a>					
					<ul>
						<li><a href="Khachhang/sanpham.php?loai=6">Váy</a></li>
						<li><a href="Khachhang/sanpham.php?loai=7">Váy yếm</a></li>
					</ul>
				</li>
				<li><a href="Khachhang/giohang.php">Giỏ hàng</a></li>	
				<li><a href="Khachhang/tintuc.php">Tin tức</a></li>
				<li><a data-target="#support-form" data-toggle="modal" href="#">Hỗ trợ</a></li>
				<?php
							if(!isset($_SESSION['userName']))
								echo '<li><a href="Khachhang/login.php">Đăng nhập</a></li>';
							else
								echo '<li><a href="Khachhang/logout.php">Đăng xuất</a></li>';
							?>
			</ul>
		</nav>
				</div>
			</section>
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="themes/images/carousel/background.png" alt="" />
						</li>
						<li>
							<img src="themes/images/carousel/bg1.jpg" alt="" />
							<div class="intro">
								<!-- <h1>Mid season sale</h1>
								<p><span>Up to 50% Off</span></p>
								<p><span>On selected items online and in stores</span></p> -->
							</div>
						</li>
					</ul>
				</div>			
			</section>
			<section class="header_text">
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
									<!-- Mo ket noi -->
									<?php
									include("ConnectDb/open.php");
									$query="SELECT * FROM tblsanpham ";							 
									//phân trang sản phẩm
									// Tính tổng số sp
									$resultTongSp=mysqli_query($con,"select count(*) as tongSp from tblsanpham where tenSp like '%$tenSp%'");
									$rowTongSp=mysqli_fetch_array($resultTongSp);
									$tongSp=$rowTongSp["tongSp"];
									$soSanPham1Trang=9;
									//tổng số trang
									$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
									$start=0;
									if(isset($_GET["page"]))
									{
										$start=$_GET["page"]*$soSanPham1Trang;	
									}

									// Hiển thị sản phẩm
									if(isset($_GET['loai'])){
										$maloai= $_GET['loai'];
										$result=mysqli_query($con,"select * from tblsanpham where tenSp like '%$tenSp%' and maLoaiSp=$maloai limit $start,$soSanPham1Trang");
									}else{
										$result=mysqli_query($con,"select * from tblsanpham where tenSp like '%$tenSp%' limit $start,$soSanPham1Trang");
									}

									?>
									<table>
										<tr>
										<?php
										$dem=0;
										while($sp=mysqli_fetch_array($result))
										{
											$dem++;
											?>
											<ul style="list-style-type:none">
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>
														<p><a href="Khachhang/chitietsanpham.php?maSp=<?php echo($sp['maSp']);?>"><img src=" <?php echo(ltrim(ltrim($sp['anh'], "."), "/"))?>" alt="" /></a></p>
														<a href="Khachhang/chitietsanpham.php?maSp=<?php echo($sp["maSp"]);?>" class="title"><?php echo($sp['tenSp']);?></a><br/>
														<a href="Khachhang/sanpham.php" class="category"> </a>
														<p class="price"><?php echo number_format($sp['gia']);?></p>
													</div>
												</li>
											</ul>
											<?php
											}
											include("ConnectDb/close.php");
											?>
												</tr>
											</table>								
											<hr>
											<div class="pagination pagination-small pagination-centered">

												<!-- ----------------------------------------- -->
												<ul>
													<?php
													$tranghientai = $start / $soSanPham1Trang;
													?>
													<li><a href="?page=<?php echo($tranghientai - 1);?>">Trước</a></li>
													<?php
													for($i=0;$i<$tongSoTrang;$i++)
													{
														if($i == $tranghientai and $tenSp!="")
														{
														?>
															<li><a href="?txtTen=<?php echo $tenSp;?>&&page=<?php echo($i);?>"><?php echo($i+1);?></a></li>
														<?php
														}
														else
														{
														?>
															<li class="active"><a href="?page=<?php echo($i);?>"><?php echo($i+1);?></a></li>
														<?php
														}
													}
													?>
													<li><a href="?page=<?php echo($tranghientai + 1);?>">Sau</a></li>
													</ul>
													</div>
												</div>
											</h4>
										</div>							
									</div>
								</div>						
							</div>
			<section class="our_client">
				<h4 class="title"><span class="text">Nhà sản xuất</span></h4>
				<div class="row">					
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/2.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/3.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/4.png"></a>
					</div>
				</div>
			</section>
			<section id="footer-bar">
	<div class="row">
		<div class="span3">
			<h4>
				<ul class="nav">
					<li><a href="index.php">Trang chủ</a></li>
					<li><a href="Khachhang/giohang.php">Giỏ hàng</a></li>
				</ul>
			</h4>
		</div>
		<div class="span4">
			<h4>Liên hệ:
				<ul class="nav">
					<li>Địa chỉ: 99 Lê Thanh Nghị</li>
					<li>Số điện thoại: 0368354829</li>
					<li><a href="https://www.facebook.com/sakurafashion.vn/">Facebook:https://www.facebook.com/sakurafashion.vn/</a></li></h4>
				</ul>
			</div>
		</div>
	</section>
		</div>
		<div id="support-form" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Yêu cầu hỗ trợ</h4>
					</div>
					<div class="modal-body">
						<form action="#" method="post">
							<?php if(!isset($_SESSION['userName'])) echo '
							<div class="form-group">
								<input style="width: 500px" type="text" name="name" placeholder="Tên của bạn" class="form-control">
							</div>
							<div class="form-group">
								<input style="width: 500px" type="text" name="phone" placeholder="Số điện thoại" class="form-control">
							</div>
							<div class="form-group">
								<input style="width: 500px" type="email" name="email" placeholder="Email" class="form-control">
							</div>'; ?>
							<div class="form-group">
								<input style="width: 500px" type="text" name="subject" placeholder="Tiêu đề" class="form-control">
							</div>
							<div class="form-group">
								<textarea style="width: 500px" placeholder="Nội dung thắc mắc" rows="4" class="form-control"></textarea>
							</div>
							<div class="loginbox">
								<button class="btn" type="submit">Gửi</button>
							</div>                    
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>