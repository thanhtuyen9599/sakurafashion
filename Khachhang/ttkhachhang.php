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
        <style type="text/css">
            .table{
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
				<h4><span></span></h4>
			</section>
    <?php
        $user= $_SESSION["userName"];
        //mo ket noi
        include("../ConnectDb/open.php");
        $sql = "select * from tblkhachhang where userName='$user' ";
		$result = mysqli_query($con,$sql);
    ?>
    <table border="1" cellpadding="0" cellspacing="0" class="table">
                    <tr>
                        <th>Mã Kh</th>
                        <th>Tên đăng nhập</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    while($kh=mysqli_fetch_array($result))
                    {
                        //moi 1 ban ghi hay 1 kh se la 1 dong
                        ?>
                        <tr>
                            <td><?php echo($kh["maKh"]);?></td>
                            <td><?php echo($kh["userName"]);?></td>
                            <td><?php echo($kh["tenKh"]);?></td>
                            <td><?php echo($kh["ngaySinh"]);?></td>
                            <td><?php echo($kh["gioiTinh"]);?></td>
                            <td><?php echo($kh["sdt"]);?></td>
                            <td><?php echo($kh["diaChi"]);?></td>
                            <td><?php echo($kh["email"]);?></td>
                            <td><a href="suaKhachHang.php?maKh=<?php echo($kh["maKh"]);?>">Sửa</a></td>
                            <td><a href="xoaKhachHang.php?id=<?php echo($kh["maKh"]);?>"onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a></td>
                        </tr>
                        <?php	
                    }
                    ?>
                </table>
                <?php
            //:dong ket noi
            include("../ConnectDb/close.php");
            include("../includes/footer_bar.php");
            ?>
</body>
</html>