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
			#tt {position: absolute; top:130px; left:580px; color:#C00}
        </style>
    </head>

    <body>
        <div id="top-bar" class="container">
            <div class="row">
                <div class="span4">
                    <form method="POST">
                        <input type="text" class="input-block-level search-query" placeholder="Tìm kiếm">
                    </form>
                </div>
                <div class="span8">
                    <div class="account pull-right">
                        <ul class="user-menu">
                            <li><a href="../index.php">Trang chủ</a></li>               
                            <li><a href="../giohang.php">Giỏ hàng</a></li>                    
                            </li>               
                            <?php
                            if(!isset($_SESSION['userName']))
                                echo '<li><a href="login.php">Đăng nhập</a></li>';
                            else
                                echo '<li><a href="logout.php">Đăng xuất</a></li>';
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
                            <li><a href="quanlyloaisanpham.php">QL loại SP</a></li>
                            <li><a href="quanlysanpham.php">QL sản phẩm</a></li>
                            <li><a href="quanlykhachhang.php">QL khách hàng</a></li>
                            <li><a href="quanlyhoadon.php">QL hóa đơn</a></li>
                            <li><a href="quanlytintuc.php">QL tin tức</a></li>
                            <li><a href="quanlyhotro.php">QL hỗ trợ</a></li>
                            <?php
                            if($admin['phanQuyen']==1)
                            {
                                echo '<li><a href="quanlyadmin.php">QL admin</a></li>';
                                echo '<li><a href="quanlydanhmuc.php">QL danh mục</a></li>';
                                echo '<li><a href="quanlynsx.php">QL nhà sản xuất</a></li>';
                            }
                            ?> 
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
	<?php
	if(isset($_GET["id"]))
	{
		$id=$_GET["id"];
		//b1:mo ket noi:
			include("../ConnectDb/open.php");
		//b2:thao tac lay ve
		$sql="select * from tintuc where id='$id'";
		$result=mysqli_query($con,$sql);
		$id=mysqli_fetch_array($result);
		?>
        <form action="suatintucprocess.php" enctype="multipart/form-data" method="post">
            <table>
   	 	<div id="tt"><h3>Thêm tin tức</h3></div>
       <tr>
       		<th>ID:<input type="text" name="txtma" value="<?php echo($id["id"]);?>" readonly="readonly"/><br /></th>
       </tr>
       <tr>
        	<th>Ảnh:<input type="text" name="anh" /><br /></th>
        </tr>
        <tr>
        	<th>Ngày đăng:<input type="date" name="date"/><br/></th>
        </tr>
        <tr>
        	<th>Tiêu đề:<input type="text" name="tieude" /><br /></th>
        </tr>
        <tr>
        	<th >Mô tả:<textarea name="mota"></textarea><br /></th>
        </tr>
        <tr>
        	<th>Nội dung:<textarea name="noidung"></textarea><br /></th>
        </tr>
        <tr>
        	<th><input type="submit" value="Cập nhật" /></th>
        </tr>
      </table>
            <?php
            	$result=mysqli_query($con,"select * from tintuc");
			//b3:dong ket noi
            include("../ConnectDb/close.php");
            ?>
        </form>
        <?php
	}else
	{
		header("Location:quanlytintuc.php");	
	}
	?>
</body>
</html>