<?php
    session_start();
    if(!isset($_SESSION["userName"]))
    {
        //chua login thi phai login da
        header("Location:login.php");
    }
?>
<?php

    $user=$_SESSION["userName"];
    $pw=$_SESSION["passWord"];
    echo $user;
    $oldpw=md5($_POST["old_pw"]);
    $newpw=md5($_POST["new_pw"]);
    $prepw=md5($_POST["pre_pw"]);
    if(isset($_POST["dongy"]))
    {
        
        if(!$old_pw || !$new_pw ||!$pre_pw)
        {
            echo"bạn phải nhập nhập đầy đủ thông tin!";
            exit;
        }
    
        else if($oldpw=!$pw)
        {
            echo"mật khẩu cũ nhập không đúng!";
            exit;
        }
        else if($newpw!=$prepw)
        {
            echo"mật khẩu xác nhận sai!";
            exit;
        }
        else 
        {
            $sql=mysql_query(" UPDATE tbladmin SET passWord='$new_pw' WHERE userName='$user'");
            echo"mật khẩu đã thay đổi";
        }
    }
?>