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

    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="../themes/css/animate.css"/> 
    <!-- Progress bar  -->
    <link rel="stylesheet" type="text/css" href="../themes/css/bootstrap-progressbar-3.3.4.css"/> 
    <!-- Theme color -->
		<!-- <link id="switcher" href="../themes/css/theme-color/fountain-blue-theme.css" rel="stylesheet"> -->
		<!-- Style -->
		<link rel="stylesheet" type="text/css" href="../themes/style1.css">

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
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="../themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
			<ul>
				<li><a href="sanpham.php?maloai=1">Áo</a>					
					<ul>
						<li><a href="sanpham.php?loai=1">T-Shirt</a></li>
						<li><a href="sanpham.php?loai=2">Hoodie</a></li>
						<li><a href="sanpham.php?loai=3">Áo khoác</a></li>
					</ul>
				</li>															
				<li><a href="sanpham.php?maloai=2">Quần</a>					
					<ul>
						<li><a href="sanpham.php?loai=4">Quần jeans</a></li>
						<li><a href="sanpham.php?loai=5">Quần sooc</a></li>
					</ul>
				</li>
				<li><a href="sanpham.php?maloai=3">Váy đầm</a>					
					<ul>
						<li><a href="sanpham.php?loai=6">Váy</a></li>
						<li><a href="sanpham.php?loai=7">Váy yếm</a></li>
					</ul>
				</li>
				<li><a href="tintuc.php">Tin tức</a></li>
				<li><a data-target="#support-form" data-toggle="modal" href="#">Hỗ trợ</a></li>
			</ul>
		</nav>
				</div>
			</section>
		</div>
		<!-- ------------------------------------------------------------------------------------------ -->
		<!-- Support Form Modal Window -->
		<div id="support-form" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Yêu cầu hỗ trợ</h4>
					</div>
					<div class="modal-body">
						<form action="#" method="post">
							<div class="form-group">
								<input style="width: 500px" type="text" name="name" placeholder="Tên của bạn" class="form-control">
							</div>
							<div class="form-group">
								<input style="width: 500px" type="text" name="phone" placeholder="Số điện thoại" class="form-control">
							</div>
							<div class="form-group">
								<input style="width: 500px" type="email" name="email" placeholder="Email" class="form-control">
							</div>
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

		<!-- ------------------------------------------------------------------------------------------ -->

		<!-- News -->
		<div class="container">
			<div class="content">
				<div class="post">
					<?php
		        	// Mo ket noi
		        	include("../ConnectDb/open.php");
		            $sql = "SELECT * FROM tintuc";
		            //Chay cau lenh
		            $result = mysqli_query($con, $sql);
		            while($tin=mysqli_fetch_array($result))
		            {
					?>
					<div class="post-sub">
						<div class="post-img">
							<?php echo '<img src="' . $tin['anh'] . '" class="thumbnail">'; ?>
						</div>
						<div class="post-content">
							<h2><?php echo $tin['tieuDe']; ?></h2>
							<?php echo $tin['moTa']; ?><br/>
							<input type="button" class="btn" value="Xem thêm">
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- ------------------------------------------------------------------------------------------ -->
		<!-- scripts -->
		<script src="../themes/js/jquery-1.7.2.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>				
		<script src="../themes/js/superfish.js"></script>	
		<script src="../themes/js/jquery.scrolltotop.js"></script>
		<script src="../themes/js/common.js"></script>
		<script src="../themes/js/jquery.flexslider-min.js"></script>
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
	<?php include("../ConnectDb/close.php"); ?>
</html>