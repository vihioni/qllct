<?php 
echo "<div class='connect'>";
    $conn = mysqli_connect('localhost','root','','db_qllct');
    if (!$conn){
        die("Kết nối không thành công" . mysqli_connect_error());
    } else {
 
    } 
echo "</div>";
?>