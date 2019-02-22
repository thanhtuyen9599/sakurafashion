<?php 
    include("../ConnectDb/open.php");

if(isset($_POST["user"])&&isset($_POST["pass"])&&isset($_POST["tenkh"])&&isset($_POST["ngaysinh"])&&isset($_POST["gioitinh"])&&isset($_POST["sdt"])&&isset($_POST["diachi"])&&isset($_POST["email"]))
{
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    $tenkh=$_POST["tenkh"];
    $ngaysinh=$_POST["ngaysinh"];
    $gioitinh=$_POST["gioitinh"];
    $sdt=$_POST["sdt"];
    $diachi=$_POST["diachi"];
    $email=$_POST["email"];
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($user == "" || $pass == "" || $tenkh == "" || $ngaysinh == "" || $gioitinh == ""|| $sdt == "" || $diachi == "" || $email == "") 
    {
        echo "Bạn vui lòng nhập đầy đủ thông tin!";
    }else{
           // Kiểm tra tài khoản đã tồn tại chưa
           $sql="select * from tblkhachhang where userName='$user'";
           $result=mysqli_query($con, $sql);

         if(mysqli_num_rows($result)  > 0){
             echo "Tài khoản đã tồn tại!";
            }else{
             //thực hiện việc lưu trữ dữ liệu vào db
             $sql = "insert into tblkhachhang(userName,passWord,tenKh,ngaySinh,gioiTinh,sdt,diaChi,email) values('$user','$pass','$tenkh','$ngaysinh','$gioitinh','$sdt','$diachi','$email')";
             mysqli_query($con,$sql);
                echo"Chúc mừng bạn đã đăng kí thành công!";
				header("Location:taikhoan.php");
            }
            include("../ConnectDb/close.php");
        }   
}else{
    header("Location:dangki.php");
    }
?>