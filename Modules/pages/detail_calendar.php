<?php
require 'Modules/user/tool_bar_user.php';
getComfimLogout();
?>

<?php
$id = (int)$_GET['id'];

if (isset($_POST['btn_calendar--edit'])) {
    $error = array();
    $id_nv = $_SESSION['id_nv'];
    $id_pb = $_SESSION['id_pb'];
    if (empty($_POST['ngay_lct'])) {
        $error['ngay_lct'] = "Không được để trống trường này";
    } else {
        $ngay_lct = $_POST['ngay_lct'];
    }

    if (empty($_POST['thoigianbatdau_lct'])) {
        $error['thoigianbatdau_lct'] = "Không được để trống trống trường này";
    } else {
        $thoigianbatdau_lct = $_POST['thoigianbatdau_lct'];
    }

    if (empty($_POST['thoigianketthuc_lct'])) {
        $error['thoigianketthuc_lct'] = "Không được để trống trống trường này";
    } else {
        $thoigianketthuc_lct = $_POST['thoigianketthuc_lct'];
    }

    if (empty($_POST['buoi_lct'])) {
        $error['buoi_lct'] = "Không được để trống trống trường này";
    } else {
        $buoi_lct = $_POST['buoi_lct'];
    }

    if (empty($_POST['noidung_lct'])) {
        $error['noidung_lct'] = "Không được để trống trống trường này";
    } else {
        $noidung_lct = $_POST['noidung_lct'];
    }


    if (empty($_POST['diadiem_lct'])) {
        $error['diadiem_lct'] = "Không được để trống trống trường này";
    } else {
        $diadiem_lct = $_POST['diadiem_lct'];
    }

    if (empty($_POST['chuanbi_lct'])) {
        $error['chuanbi_lct'] = "Không được để trống trống trường này";
    } else {
        $chuanbi_lct = $_POST['chuanbi_lct'];
    }


    if (empty($_POST['chutri_lct'])) {
        $error['chutri_lct'] = "Không được để trống trống trường này";
    } else {
        $chutri_lct = $_POST['chutri_lct'];
    }

    if (empty($_POST['thanhphan_lct'])) {
        $error['thanhphan_lct'] = "Không được để trống trống trường này";
    } else {
        $thanhphan_lct = $_POST['thanhphan_lct'];
    }

    if (empty($_POST['ketqua_lct'])) {
        $error['ketqua_lct'] = "Không được để trống trống trường này";
    } else {
        $ketqua_lct = $_POST['ketqua_lct'];
    }

    $date = date('Y-m-d');
    while (date('w', strtotime($date)) != 1) {
        $tmp = strtotime('-1 day', strtotime($date));
        $date = date('Y-m-d', $tmp);
    }
    $tuan_lct = date('W', strtotime($date));

    if (empty($error)) {
        $data = array(
            'ngay_lct' => $ngay_lct,
            'tuan_lct' => $tuan_lct,
            'buoi_lct' => $buoi_lct,
            'thoigianbatdau_lct' => $thoigianbatdau_lct,
            'thoigianketthuc_lct' => $thoigianketthuc_lct,
            'noidung_lct' => $noidung_lct,
            'diadiem_lct' => $diadiem_lct,
            'thanhphan_lct' => $thanhphan_lct,
            'chuanbi_lct' => $chuanbi_lct,
            'chutri_lct' => $chutri_lct,
            'ketqua_lct' => $ketqua_lct
        );
        $db_update = db_update('tbl_lichcongtac', $data, "`id_lct`='$id'");
        if ($db_update) {
            $alert['success'] = "Đã cập nhật dữ liệu mới";
        } else {
            $alert['success'] = "Bạn chưa chỉnh sửa thông tin";
        }
    }
}

$item = db_fetch_row("SELECT * FROM `tbl_lichcongtac` WHERE `id_lct`= '$id'");

$getdate = strtotime($item['ngay_lct']);
$day_detail = date("d-m-Y", $getdate);
$time_info = getdate($getdate);
require 'base/time_info.php';
?>


<h1 class="title_text">Lịch chi tiết <?php echo $weekday . " Ngày: " . $day_detail ?></h1>
<p class="staff_name">NGUYỄN VÕ THANH</p>

<div class="detail-calendar">
    <div class="detail_container">
        <div class="modal_header">
            <p>Chi tiết lịch tuần</p>
            <a href="index.php" class="icon-colos--modal fa-solid fa-arrow-right-from-bracket"></a>
        </div>

        <div class="modal-body">
            <form enctype="multipart/form-data" action="" method="post" class="modal-form">
                <?php if (!empty($alert['success'])) { ?>
                    <p class="success">
                        <i class="icon-check fa-solid fa-check"></i>
                    <?php echo $alert['success'];
                } ?>
                    </p>
                    <div class="wrapper_time">
                        <div class="wrapper_item">
                            <span class="">Ngày(*)</span>
                            <input type="date" name="ngay_lct" id="date" value="<?php echo $item['ngay_lct'] ?>">
                        </div>
                        <div class="wrapper_item">
                            <span>Từ giờ(*)</span>
                            <input type="time" name="thoigianbatdau_lct" value="<?php echo $item['thoigianbatdau_lct'] ?>">
                        </div>
                        <div class="wrapper_item">
                            <span>Đến giờ(*)</span>
                            <input type="time" name="thoigianketthuc_lct" value="<?php echo $item['thoigianketthuc_lct'] ?>">
                        </div>
                        <div class="wrapper_item ">
                            <span>Ca trực(*)</span>
                            <select class="option" name="buoi_lct" id="">
                                <option value="">---Buổi---</option>
                                <option <?php if ($item['buoi_lct'] == 'SA') echo "selected ='selected'" ?> value="SA">Sáng
                                </option>
                                <option <?php if ($item['buoi_lct'] == 'CH') echo "selected ='selected'" ?> value="CH">Chiều
                                </option>
                                <option <?php if ($item['buoi_lct'] == 'fulltime') echo "selected ='selected'" ?> value="fulltime">Cả ngày</option>
                            </select>
                        </div>
                    </div>

                    <div class="wrapper_info">
                        <div class="wrapper_item--info">
                            <label for="">Tuần:</label>
                            <input name="tuan_lct" id="" class="form_input" placeholder="Nội dung" value="<?php echo $item['tuan_lct'] ?>">
                        </div>
                        <div class="wrapper_item--info">
                            <label for="">Nội dung:</label>
                            <input name="noidung_lct" id="form-content" placeholder="Nội dung" value="<?php echo $item['noidung_lct'] ?>"></input>
                        </div>
                        <div class="wrapper_item--info">
                            <label for="">Địa điểm:</label>
                            <input type="text" name="diadiem_lct" id="address" placeholder="Địa điểm" value="<?php echo $item['diadiem_lct'] ?>" class="form_input">
                        </div>
                        <div class="wrapper_item--info">
                            <label for="">Chuẩn bị:</label>
                            <input type="text" name="chuanbi_lct" placeholder="Chuẩn bị" value="<?php echo $item['chuanbi_lct'] ?>" class="form_input">
                        </div>
                        <div class="wrapper_item--info">
                            <label for="">Chủ trì:</label>
                            <input type="text" name="chutri_lct" placeholder="Chủ trì" value="<?php echo $item['chutri_lct'] ?>" class="form_input">
                        </div>
                        <!-- <div class="wrapper_item--info">
                        <label for="">Kết quả</label>
                        <input type="text" name="fullname" placeholder="Kết quả" class="form_input">
                    </div> -->
                        <div class="wrapper_item--info">
                            <label for="">Thành phần:</label>
                            <input type="text" name="thanhphan_lct" placeholder="Thành phần" value="<?php echo $item['thanhphan_lct'] ?>" class="form_input">
                        </div>
                        <div class="wrapper_item--info">
                            <label for="">Kết quả:</label>
                            <input type="text" name="ketqua_lct" placeholder="Chủ trì" value="<?php echo $item['ketqua_lct'] ?>" class="form_input">
                        </div>
                    </div>
                    <div class="wrapper_btn">
                        <input type="submit" name="btn_calendar--edit" class="btn_edit" value="Lưu thông tin">
                    </div>
            </form>
        </div>
    </div>
</div>