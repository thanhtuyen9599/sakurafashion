<?php
    session_start();
    unset($_SESSION["gioHang"]);
    header("Location:giohang.php");
?>