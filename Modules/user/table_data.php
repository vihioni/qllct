<?php
@session_start();
$date = date('Y-m-d');
while (date('w', strtotime($date)) != 1) {
    $tmp = strtotime('-1 day', strtotime($date));
    $date = date('Y-m-d', $tmp);
}
$week = date('W', strtotime($date));
$id = $_SESSION['id_nv'];
$list_calendar = db_fetch_array("SELECT * FROM `tbl_lichcongtac` WHERE `tuan_lct`='{$week}' AND `id_nv`='{$id}' ORDER BY `ngay_lct` ASC");
?>

<?php
foreach ($list_calendar as &$calendar) {
    $calendar['url_detail'] = "?mod=pages&act=detail_calendar&id={$calendar['id_lct']}";
}
?>
<div class="content">
    <h1 class="title_text">Lịch công tác tuần <?php echo $week ?></h1>
    <p class="staff_name"><?php echo $_SESSION['ten_nv'] ?></p>
    <div class="wrapper_btn-add-mobile">
        <a href="#modal_add-calendar" class="btn_add--mobile"><i class="icon_add fa-solid fa-calendar-plus"></i>Thêm
            lịch tuần</a>
    </div>
    <?php
    if (!empty($list_calendar)) {
    ?>
        <div class="container">
            <table class="table_data table_stripped">
                <thead>
                    <tr>
                        <th class="data_line">Thời gian</th>
                        <th class="data_line">Buổi</th>
                        <th class="data_line ">Nội dung</th>
                        <th class="data_line data_line--mobile">Chủ trì</th>
                        <th class="data_line data_line--mobile">Thành phần</th>
                        <th class="data_line">Địa điểm</th>
                        <th class="data_line data_line--mobile">Ghi chú</th>
                        <th class="data_line">Tác vụ</th>
                    </tr>
                </thead>
                <?php
                $temp = 0;
                foreach ($list_calendar as &$calendar) {
                    $getdate = strtotime($calendar['ngay_lct']);
                    $time_info = getdate($getdate);
                    require 'base/time_info.php';
                ?>
                    <tbody>
                        <tr>
                            <td class="data_line data_line--mobile"><?php echo $weekday . " " . $calendar['ngay_lct']; ?></td>
                            <td class="data_line">
                                <?php if ($calendar['buoi_lct'] == 'SA') {
                                    echo "Sáng";
                                }
                                if ($calendar['buoi_lct'] == 'CH') {
                                    echo "Chiều";
                                }
                                if ($calendar['buoi_lct'] == 'fulltime') {
                                    echo "Cả ngày";
                                }  ?>
                            </td>
                            <td class="data_line"><?php echo $calendar['noidung_lct']; ?></td>
                            <td class="data_line data_line--mobile"><?php echo $calendar['chutri_lct']; ?></td>
                            <td class="data_line data_line--mobile"><?php echo $calendar['thanhphan_lct']; ?></td>
                            <td class="data_line "><?php echo $calendar['diadiem_lct']; ?></td>
                            <td class="data_line data_line--mobile"><?php echo $calendar['chuanbi_lct']; ?></td>
                            <td class="data_line"><a href="<?php echo $calendar['url_detail'] ?>"><i class="icon_edit fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                    </tbody>
                <?php
                } ?>
            </table>
        </div>
    <?php
    }
    ?>
</div>