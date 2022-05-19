<?php
@session_start();

if (isset($_POST['btn_add--calendar'])) {
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
            'ketqua_lct' => 'Đang chờ',
            'id_nv' => $id_nv,
            'id_pb' => $id_pb
        );
        $db_insert = db_insert("tbl_lichcongtac", $data);
        if ($db_insert) {
            $alert['success'] = "Thêm lịch mới thành công!";
        }
    }
}
?>

<div class="modal_add-calendar" id="modal_add-calendar">
    <div class="modal_container">
        <div class="modal_header">
            <p class="title_header"><i class="icon fa-regular fa-address-card"></i> Thêm lịch tuần</p>
            <a href="#" class="icon-colos--modal fa-solid fa-arrow-right-from-bracket"></a>
        </div>

        <div class="modal-body">
            <?php if (!empty($alert['success'])) { ?>
                <p class="success">
                    <i class="icon-check fa-solid fa-check"></i>
                <?php echo $alert['success'];
            } ?>
                </p>
                <form enctype="multipart/form-data" action="" method="post" class="modal-form">
                    <div class="wrapper_time">
                        <div class="wrapper_item">
                            <span class="">Ngày(*)</span>
                            <input type="date" name="ngay_lct" id="date" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="wrapper_item">
                            <span>Từ giờ(*)</span>
                            <input type="time" name="thoigianbatdau_lct" value="<?php echo time() ?>">
                        </div>
                        <div class="wrapper_item">
                            <span>Đến giờ(*)</span>
                            <input type="time" name="thoigianketthuc_lct" value="<?php echo time() ?>">
                        </div>
                        <div class="wrapper_item ">
                            <span>Buổi(*)</span>
                            <select class="option" name="buoi_lct" id="">
                                <option value="">---Buổi---</option>
                                <option value="Sáng">Sáng</option>
                                <option value="Chiều">Chiều</option>
                                <option value="Cả ngày">Cả ngày</option>
                            </select>
                        </div>
                    </div>

                    <div class="wrapper_info">
                        <div class="wrapper_item--info">
                            <label for="">Nội dung:</label>
                            <textarea name="noidung_lct" id="form-content" placeholder="Nội dung"></textarea>
                        </div>
                        <div class="wrapper_item--info">
                            <label for="">Địa điểm:</label>
                            <input type="text" name="diadiem_lct" id="address" placeholder="Địa điểm" class="form_input">
                        </div>
                        <div class="wrapper_item--info">
                            <label for="">Chuẩn bị:</label>
                            <input type="text" name="chuanbi_lct" placeholder="Chuẩn bị" class="form_input">
                        </div>
                        <div class="wrapper_item--info">
                            <label for="">Chủ trì:</label>
                            <input type="text" name="chutri_lct" placeholder="Chủ trì" class="form_input">
                        </div>
                        <div class="wrapper_item--info">
                            <label for="">Thành phần:</label>
                            <input type="text" name="thanhphan_lct" placeholder="Thành phần" class="form_input" value="<?php echo $_SESSION['ten_nv']; ?>">
                        </div>
                    </div>
                    <div class="wrapper_btn">
                        <input type="submit" name="btn_add--calendar" class="btn_add--calendar" value="Lưu">
                    </div>
                </form>
        </div>
    </div>
</div>