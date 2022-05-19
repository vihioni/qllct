<?php
@session_start();
    require 'inc/template.php';
    require 'connect/connectdb.php';
    require 'inc/database.php';
    require 'inc/dateTime.php';
?>

<?php
getHeader();
$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'public';
$act = !empty($_GET['act']) ? $_GET['act'] : 'home';
$path = "Modules/{$mod}/{$act}.php";
if (file_exists($path)) {
    require $path;
} else {
    echo "Không tồn tại";
}


?>