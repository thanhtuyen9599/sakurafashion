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
			accordion-body collapse{
				margin:auto;
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
		if(isset($_SESSION['userName'])){
			
		}else {
			header("Location:login.php");
		}
			$user= $_SESSION["userName"];
			
			include("../ConnectDb/open.php");
			$sql = "select * from tblkhachhang where userName='$user'";
			$result = mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			include("../ConnectDb/close.php");
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
				<h4><span>Thông tin cá nhân</span></h4>
			</section>	
			<section class="main-content">
				<div class="row">
					<div class="span12">
						<div class="accordion" id="accordion2">
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Checkout Options</a>
								</div>
								<div id="collapseOne" class="accordion-body in collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
											<div class="span6">
												<h4>New Customer</h4>
												<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
												<form action="dangki.php" method="post">
													<fieldset>
														<label class="radio" for="register">
															<input type="radio" name="account" value="register" id="register" checked="checked">Register Account
														</label>
														<label class="radio" for="guest">
															<input type="radio" name="account" value="guest" id="guest">Guest Checkout
														</label>
														<br>
														<button class="btn btn-inverse" data-toggle="collapse" data-parent="#collapse2">Continue</a></button>
														
													</fieldset>
												</form>
											 </div>
											 <div class="span6">
												<h4>Returning Customer</h4>
												<p>I am a returning customer</p>
												<form action="dangki.php" method="post">
													<fieldset>
														<div class="control-group">
															<label class="control-label">Tên đăng phập</label>
															<div class="controls">
																<input type="text" placeholder="Enter your username" id="username" class="input-xlarge">
															</div>
														</div>
														<div class="control-group">
															<label class="control-label">Mật khẩu</label>
															<div class="controls">
															<input type="password" placeholder="Enter your password" id="password" class="input-xlarge">
															</div>
														</div>
														<button class="btn btn-inverse">Tiếp tục</button>
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Tài khoản</a>
								</div>
								<div id="collapseTwo" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
											<div class="span6">
												<h4>Thông tin cá nhân</h4>
												<div class="control-group">
													<!-- <label class="control-label">Tên đăng nhập</label> -->
													<div class="controls">
														<!-- <input type="text" placeholder="" class="input-xlarge" value="<?php echo($row['userName']);?>"/> -->
													</div>
												</div>
												<div class="control-group">
													<!-- <label class="control-label">Mật khẩu</label> -->
													<div class="controls">
														<!-- <input type="password" placeholder="" class="input-xlarge" value="<?php echo($row['passWord']);?>"/> -->
													</div>
												</div>					  
												<div class="control-group">
													<label class="control-label">Tên khách hàng</label>

													<div class="controls">
														<input type="text" placeholder="" class="input-xlarge" value="<?php echo($row['tenKh']);?>"/>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Ngày sinh</label>
													<div class="controls">
														<input type="date" placeholder="" class="input-xlarge" value="<?php echo($row['ngaySinh']);?>"/>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Giới tính</label>
													<div class="controls">
														<input type="radio" placeholder="" class="input-xlarge" value="" name="gioitinh" <?php if($row['gioiTinh']==1) echo("checked");?>/>Nam
														<input type="radio" placeholder="" class="input-xlarge" value="" name="gioitinh" <?php if($row['gioiTinh']==0) echo("checked");?>/>Nữ
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Số điện thoại</label>
													<div class="controls">
														<input type="text" placeholder="" class="input-xlarge" value="<?php echo($row['sdt']);?>"/>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Địa chỉ</label>
													<div class="controls">
														<input type="text" placeholder="" class="input-xlarge" value="<?php echo($row['diaChi']);?>"/>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Email</label>
													<div class="controls">
														<input type="text" placeholder="" class="input-xlarge" value="<?php echo($row['email'])?>"/>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"></label>
													<div class="controls">
													<a href="suaKhachHang.php" title="Sửa thông tin">Sửa thông tin
												</div>
											</div>
										</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">Confirm Order</a>
								</div>
								<div id="collapseThree" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
											<div class="control-group">
												<label for="textarea" class="control-label">Comments</label>
												<div class="controls">
													<textarea rows="3" id="textarea" class="span12"></textarea>
												</div>
											</div>									
											<button class="btn btn-inverse pull-right">Confirm order</button>
										</div>
									</div>
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
    </body>
</html>