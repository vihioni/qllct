<div class="function">
    <div class="wrapper_iner">
        <div class="function_item function_item--mobile-1">
            <!-- <a href="" class="btn_add"><i class="icon_add fa-solid fa-calendar-plus"></i>Lịch phân công</a> -->
            <a href="#modal_add-calendar" class="btn_add"><i class="icon_add fa-solid fa-calendar-plus"></i>Thêm lịch tuần</a>
        </div>
        <span class="seperate"></span>
        <div class="function_item">
            <span class="today">Ngày hôm nay:</span>
            <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" class="date_function" />

        </div>
        <span class="seperate"></span>
        <div class="function_item function_item--mobile-3">
            <span class="weekday"> <?php echo $weekday; ?></span>
            <span class="seperate"></span>
            <span class="week week--mobie"> <?php echo "Tuần thứ: " . $week; ?> </span>
        </div>
    </div>
</div>