<?php 
 @session_start(); 
    require 'connect/connectdb.php';
    $_SESSION['login_admin'] = true;
    echo "<script language='javascript'>";
	echo "alert('Đăng nhập với tư cách Admin!!!')";
	echo "</script>";
	echo "<meta http-equiv='refresh' content ='0;URL=index.php'>";
?>
