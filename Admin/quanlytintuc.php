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

        <!-- Button Style -->
        <!-- <link rel="stylesheet" href="../bootstrap/css/ButtonStyle.css"> -->
        <!-- Table Style -->
        <link href="../themes/css/tablecss.css" rel="stylesheet">
        <!-- User Profile Style -->
        <!-- <link rel="stylesheet" type="text/css" href="../bootstrap/css/UserProfile.css"/> -->
        <!-- Change Password -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/ChangePassword.css"/>

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
		//b1:mo ket noi voi database
		//b2:thao tac database
		//b2.1:viet cau query
			$sql="select * from tintuc";
		//b2.2:chay cau query
			$result=mysqli_query($con,$sql);
		?>
			<div class="table-users">
                <div class="header">Quản lý tin tức</div>
                 
                <table cellspacing="0">
    			<tr>
        			<th style="width: 100px">ID</th>
                    <th style="width: 150px">Ảnh</th>
                    <th style="width: 150px">Ngày đăng bài</th>
          	  		<th style="width: 150px">Tiêu đề</th>
                    <th style="width: 150px">Mô tả</th>
                    <th style="width: 750px">Nội dung</th>
                    <th style="width: 100px"></th>
            		<th style="width: 250px"><a href="themtintuc.php">Thêm mới</a></th>
        		</tr>
       	 <?php
			
			while($tintuc=mysqli_fetch_array($result))
			{
				//moi 1 ban ghi se la 1 dong
			?>
           	 <tr>
            	<td><?php echo($tintuc["id"]);?></td>
                <td><?php echo($tintuc["anh"]);?></td>
                <td><?php echo($tintuc["ngayDangbai"]);?></td>
                <td><?php echo($tintuc["tieuDe"]);?></td>
                <td><?php echo($tintuc["moTa"]);?></td>
                <td><?php echo($tintuc["noiDung"]);?></td>
                <td><a href="xoatintuc.php?id=<?php echo($tintuc["id"]);?>" onClick="return confirm('Ban co chac chan muon xoa khong?');">Xóa</a></td>
                <td><a href="suatintuc.php?id=<?php echo($tintuc["id"]);?>">Sửa</a></td>
            </tr>
            <?php	
			}
			?>
			<th></th>
            <th></th>
            <th></th>
			<th></th>
			<th></th>
            <th></th>
			<th></th>
			<th style="width: 150px"> <a href="trangcanhan.php">Thoát</a></th>
    </table>
</div>
</body>
   <?php
	//b3:dong ket noi
		include("../ConnectDb/close.php");
	?>
    </html>
	