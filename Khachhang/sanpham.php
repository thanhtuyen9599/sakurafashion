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
			<section class="header_text sub">
			<img class="pageBanner" src="../themes/images/pageBanner.png" alt="New products" >
				<h4><span></span></h4>
			</section>
			<a href="giohang.php">XEM GIỎ HÀNG</a>
			<section class="main-content">
				
				<div class="row">						
					<div class="span9">								
						<ul class="thumbnails listing-products">

						<!-- Mo ket noi -->
						<?php
							include("../ConnectDb/open.php");
							 $query="SELECT * FROM tblsanpham ";							 
							//phân trang sản phẩm
							// Tính tổng số sp
							$resultTongSp=mysqli_query($con,"select count(*) as tongSp from tblsanpham where tenSp like '%$tenSp%'");
							$rowTongSp=mysqli_fetch_array($resultTongSp);
							$tongSp=$rowTongSp["tongSp"];
							$soSanPham1Trang=6;
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
								$result=mysqli_query($con,"select * from tblsanpham where maLoaiSp=$maloai and tenSp like '%$tenSp%' limit $start,$soSanPham1Trang");
							}else
							{
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
										<li class="span3">
											<div class="product-box">
												<span class="sale_tag"></span>
												<p><a href="chitietsanpham.php?maSp=<?php echo($sp['maSp']);?>">
												<img src="<?php echo($sp['anh'])?>" alt="" /></a></p>
												<a href="chitietsanpham.php?maSp=<?php echo($sp["maSp"]);?>" class="title"><?php echo($sp['tenSp']);?></a><br/>
												<a href="sanpham.php" class="category"> </a>
												<p class="price"><?php echo number_format($sp['gia']);?></p>
											</div>
										</li>
									<?php
								}
								?>
								</tr>
							</table>
						</ul>								
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
									if($i == $tranghientai )
									{
									?>
										<li><a href="?page=<?php echo($i);?>"><?php echo($i+1);?></a></li>
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
							<!-- -------------------------------------------- -->
								
							
						</div>
					</div>
				</div>
			<div>
			</section>
			<?php
			include("../includes/footer_bar.php");
		?>
		</div>
		<script src="../themes/js/common.js"></script>	
    </body>
</html>
<?php 
	include("../ConnectDb/close.php");
?>