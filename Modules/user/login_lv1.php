<?php 
 @session_start(); 
    require 'connect/connectdb.php';
    $_SESSION["login_user_lv1"] = true;
    echo "<script language='javascript'>";
	echo "alert('Đăng nhập thành công!!!')";
	echo "</script>";
	echo "<meta http-equiv='refresh' content ='0;URL=index.php'>";
?>