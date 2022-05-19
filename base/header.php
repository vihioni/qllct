<?php
@session_start();
require 'inc/dateTime.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/reponsive.css">
    <link rel="stylesheet" href="asset/font/fontawesome-free-6.0.0-beta3-web/fontawesome-free-6.0.0-beta3-web/css/all.min.css">

    <title>Trang chủ</title>
</head>

<body>
 <?php
    if(isset($_SESSION["login_user_lv1"])) {
        require 'base/header-user.php';
    }
    if(isset($_SESSION['login_admin'])) {
        require 'base/header-admin.php';
    }
 ?>
</body>

</html>