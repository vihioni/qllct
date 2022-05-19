<?php
 date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d');
while (date('w', strtotime($date)) != 1) {
    $tmp = strtotime('-1 day', strtotime($date));
    $date = date('Y-m-d', $tmp);
}
$week = date('W', strtotime($date));
?>

<?php
$time = getdate();
if (($time["weekday"]) == 'Monday') {
    $weekday = "Thứ hai";
} else if (($time["weekday"]) == 'Tuesday') {
    $weekday = "Thứ ba";
} else if (($time["weekday"]) == 'Wednesday') {
    $weekday = "Thứ tư";
} else if (($time["weekday"]) == 'Thursday') {
    $weekday = "Thứ năm";
} else if (($time["weekday"]) == 'Friday') {
    $weekday = "Thứ sáu";
} else if (($time["weekday"]) == 'Saturday') {
    $weekday = "Thứ bảy";
} else if (($time["weekday"]) == 'Sunday') {
    $weekday = "Chủ nhật";
}
?>

