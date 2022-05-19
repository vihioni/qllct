<?php
@session_start();
getComfimLogout();
if (isset($_SESSION['login_user_lv1']) == false && isset($_SESSION['login_admin']) == false) { ?>
    <script>
        location.href = './login.php';
    </script>

<?php } else if (isset($_SESSION['login_user_lv1']) == true) {
    require 'Modules/user/tool_bar_user.php';
    require 'Modules/user/table_data.php';
} else if (isset($_SESSION["login_admin"]) == true) {
    require 'Modules/admin/admin.php';
}

require 'Modules/user/add_calenda.php';
?>