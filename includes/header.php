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
							<li><a href="../index.php">Trang chủ</a></li>
							<li><a href="../Khachhang/taikhoan.php">Tài khoản</a></li>				
							<li><a href="../Khachhang/giohang.php">Giỏ hàng</a></li>					
						</li>				
						<?php
						if(!isset($_SESSION['userName']))
							echo '<li><a href="../Khachhang/login.php">Đăng nhập</a></li>';
						else
							echo '<li><a href="../Khachhang/logout.php">Đăng xuất</a></li>';
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>