<?php
require 'inc/validation.php';
require 'connect/connectdb.php';
@session_start();

if (isset($_POST['btn_login'])) {
    $error = array();
    if (empty($_POST['username'])) {
        $error['username'] = "Không được để trống Tên đăng nhập";
    } else {
        if (!is_username($_POST['username'])) {
            $error['username'] = "Tên đăng nhập không đúng định dạng";
        } else {
            $username = $_POST['username'];
        }
    }

    if (empty($_POST['password'])) {
        $error['password'] = "Không được để trống Mật khẩu";
    } else {
        if (!is_password($_POST['password'])) {
            $error['password'] = "Yêu cầu nhập mật khẩu đúng định dạng";
        } else {
            $password = $_POST['password'];
        }
    }

    if (empty($error)) {
        $row = db_fetch_row("SELECT o.username, o.password, b.id_nv, o.level, b.ten_nv, b.id_pb FROM tbl_nhanvien As b, tbl_account AS o 
        WHERE o.id_nv=b.id_nv AND `username`='$username' AND `password`='$password'");
        if ($row) {
            if ($username == "$row[username]") {
                if ($password == "$row[password]") {
                    if ("$row[level]" == 'lv1') {
                        $_SESSION['ten_nv'] = $row['ten_nv'];
                        $_SESSION['id_nv'] = $row['id_nv'];
                        $_SESSION['id_pb'] = $row['id_pb'];
                        require 'Modules/user/login_lv1.php';
                    } else if ("$row[level]" == 'lv2') {
                        $_SESSION['ten_nv'] = $row['ten_nv'];
                        $_SESSION['id_nv'] = $row['id_nv'];
                        $_SESSION['id_pb'] = $row['id_pb'];
                        // require 'Modules/admin/login_admin.php';
                    } else if ("$row[level]" == 'lv3') {
                        $_SESSION['ten_nv'] = $row['ten_nv'];
                        $_SESSION['id_nv'] = $row['id_nv'];
                        $_SESSION['id_pb'] = $row['id_pb'];
                        require 'Modules/admin/login_admin.php';
                    }
                }
            }
        }
    } else {
        $error['password'] = "Tên tài khoản, mật khẩu chưa chính xác";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/login.css">
    <link rel="stylesheet" href="asset/font/fontawesome-free-6.0.0-beta3-web/fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="title">
        <h1 class="text_title">HỆ THỐNG QUẢN LÝ LỊCH CÔNG TÁC</h1>
    </div>
    <div id="wrapper">
        <form action="" method="post" id="form-login">
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-group">
                <!-- <i class="ti-user icon-user"></i> -->
                <i class="icon_user fa-solid fa-user"></i>
                <input type="text" class="form-input" name="username" placeholder="Tên đăng nhập">
            </div>
            <p class="error"><?php echo form_error('username'); ?></p>
            <div class="form-group">
                <!-- <i class="ti-key icon-password"></i> -->
                <i class="icon_key fa-solid fa-key"></i>
                <input type="password" class="form-input" name="password" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
            <p class="error"><?php echo form_error('password'); ?></p>
            <input type="submit" class="form-submit" name="btn_login" value="Đăng nhập">
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/login.js"></script>

</html>