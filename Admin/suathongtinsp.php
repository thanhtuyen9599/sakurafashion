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
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
			table{ position:absolute; top:200px; left:450px; width:400px;}
			#tt {position: absolute; top:130px; left:505px; color:#C00}
        </style>
    </head>

    <body>
        <div id="top-bar" class="container">
            <div class="row">
                
                <div class="span8">
                    <div class="account pull-right">
                        <ul class="user-menu">
                            <li><a href="../index.php"><h5>Trang chủ</h5></a></li>               
                            <li><a href="../giohang.php"><h5>Giỏ hàng</h5></a></li>                    
                            </li>               
                            <?php
                            if(!isset($_SESSION['userName']))
                                echo '<li><a href="login.php"><h5>Đăng nhập</h5></a></li>';
                            else
                                echo '<li><a href="logout.php"><h5>Đăng xuất</h5></a></li>';
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php
        	// Mo ket noi
        	include("../ConnectDb/open.php");
        	$tmp = $_SESSION['userName'];
            $sql1 = "SELECT * FROM tbladmin WHERE userName='$tmp'";
            //Chay cau lenh
            $result1 = mysqli_query($con, $sql1);
            // echo $result;
            //Hien dang can luu cac thong tin can thiet vao $admin
            $admin = mysqli_fetch_array($result1);
           ?>
        <div id="wrapper" class="container">
            <section class="navbar main-menu">
                <div class="navbar-inner main-menu">                
                    <a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
                    <nav id="menu" class="pull-right">
                        <ul>
                            <li><a href="trangcanhan.php">Trang cá nhân</a></li>
                            <li><a href="quanlynsx.php">QL nhà sản xuất</a></li>
                            <li><a href="quanlydanhmuc.php">QL danh mục</a></li>
                            <li><a href="quanlyloaisanpham.php">QL loại sản phẩm</a></li>
                            <li><a href="quanlysanpham.php">QL sản phẩm</a></li>
                            <li><a href="quanlykhachhang.php">QL khách hàng</a></li>
                            <li><a href="quanlyhoadon.php">QL hóa đơn</a></li>
                            <li><a href="quanlytintuc.php">QL tin tức</a></li>
                            <li><a href="quanlyhotro.php">QL hỗ trợ</a></li>
                            <?php
                            if($admin['phanQuyen']==1)
                            {
                                echo '<li><a href="quanlyadmin.php">QL admin</a></li>';
                            }
                            ?> 
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
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
        <form action="suathongtinspprocess.php" enctype="multipart/form-data" method="post">
        	<table>
        		<div id="tt"><h3>Sửa thông tin sản phẩm</h3></div>
               	<tr>
        			<th>Mã SP:<input type="text" name="txtma" value="<?php echo($sp["maSp"]);?>" readonly="readonly"/><br /></th>
                </tr>
                <tr>
            		<th>Tên SP:<input type="text" name="txtten" value="<?php echo($sp["tenSp"]);?>"/><br /></th>
                </tr>
                <tr>
            		<th>Ảnh:<input type="file" name="anh" value="<?php echo($sp["anh"]);?>"/><br /></th>
                </tr>
                <tr>
            		<th>Giá:<input type="text" name="gia" value="<?php echo($sp["gia"]);?>"/><br/></th>
                </tr>
                <tr>
            		<th>Số lượng:<input type="text" name="sl" value="<?php echo($sp["soLuong"]);?>"/><br/></th>
                </tr>
            		<th>NSX:<select name="nsx"> <br />
            <?php
            	$result=mysqli_query($con,"select * from tblnsx");
			?>
            	<option value="-1">--Chọn--</option>
            	<option value="1">DOLCE</option>
                <option value="2">ARMANI</option>
                <option value="3">VERSACE</option>
                </select></th>
              	</tr>
                <tr>
            		<th>Loại SP:<select name="lsp">
   			<?php
            	$result=mysqli_query($con,"select * from tblloaisp");
			?>
            	<option value="-1">--Chọn--</option>
            	<option value="1">T-Shirt</option>
                <option value="2">Hoodie</option>
                <option value="3">Áo khoác</option>
                <option value="4">Quần Jeans</option>
                <option value="5">Quần Sooc</option>
                <option value="6">Váy Ngắn</option>
                <option value="7">Váy Yếm</option>
            <?php
			include("../ConnectDb/close.php");
				?>
            </select><br/></th>
            </tr>
            <tr>
            	<th><input type="submit" value="Cập nhật" /></th>
            </tr>
            </table>
        </form>
        <?php
	}else
	{
		header("Location:quanlysanpham.php");	
	}
	?>
</body>
</html>