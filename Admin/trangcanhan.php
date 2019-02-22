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
        <link rel="stylesheet" href="../bootstrap/css/TableStyle.css">
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
        <?php
            //Mo ket noi voi DB
            include("../ConnectDb/open.php");
            //Viet cau lenh
            $tmp = $_SESSION['userName'];
            $sql = "SELECT * FROM tbladmin WHERE userName='$tmp'";
            //Chay cau lenh
            $result = mysqli_query($con, $sql);
            // echo $result;
            //Hien dang can luu cac thong tin can thiet vao $admin
            $admin = mysqli_fetch_array($result);
        ?>
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
                                echo '<li><a href="quanlynsx.php">QL nhà sản xuất</a></li>';
                                echo '<li><a href="quanlydanhmuc.php">QL danh mục</a></li>';
                                echo '<li><a href="quanlydoanhthu.php">QL doanh thu</a></li>';
                            }
                            ?> 
                        </ul>
                    </nav>
                </div>
            </section>
        </div>

    <div class="container">
        <div class="row">
            <!-- <div class="col-md-5  toppad  pull-right col-md-offset-3 "> -->
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" > -->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 style="color: #000" class="panel-title"><?php echo $admin['ten'] ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 "><?php echo '<img style="width: 250px; height: 250px" src="' . $admin["anh"] . '"/>'; ?>
                                </div>
                                    <!-- <div class=" col-md-9 col-lg-9 ">  -->
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr style="width: 200px">
                                                    <td>Họ và tên *</td>
                                                    <td><?php echo ($admin["ten"]); ?></td>
                                                </tr>
                                                <tr style="width: 300px">
                                                    <td>Giới tính *</td>
                                                    <td><?php
                                                        if($admin["gioiTinh"]==0)
                                                            echo "Nữ";
                                                        else
                                                            echo "Nam";
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Phân quyền</td>
                                                    <td><?php if($admin["phanQuyen"]==0) echo "admin";
                                                                else echo "superadmin"; ?></td>
                                                </tr>
                                                <form action="#" method="post">
                                                    <input type="hidden" name="maTK" value="$admin['maTK']">
                                                <tr>
                                                    <td>Ngày sinh *</td>
                                                    <td><?php echo ($admin['ngaySinh']); ?></td>;
                                                </tr>
                                                <tr>
                                                    <td>Số điện thoại</td>
                                                    <td><?php echo ($admin['sdt']); ?></td>;
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo ($admin['email']); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="capnhatttadmin.php" class="btn btn-primary">Cập nhật thông tin</a></button>
                                <!-- </form> -->
                                        <a href="pass.php" class="btn btn-primary">Đổi mật khẩu</a>
                                    <!-- </div> -->
                                </div>
                            </div>
                        <div style="text-align: right" class="panel-footer">
                        * Cần có quyền quản trị viên để chỉnh sửa
                    <!-- </div>   -->
                </div>
            <!-- </div> -->
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
    <?php include("../ConnectDb/close.php"); ?>
    </body>
        </html>