<div class="wp_header">
    <div class="header">
        <div class="header_title">
            <a href="index.php">
                <i class="header_icon--calender fa-solid fa-calendar-check"></i>
            </a>
            <h1 class="header_text">Quản lý lịch công tác</h1>

        </div>
        <div class="authen">

            <div class="header_authen">
                <img src="./asset/img/avata.jpg" alt="" class="img-user">
                <a href="" class="authen-item"><?php echo $_SESSION['ten_nv']; ?></a>
            </div>

            <ul class="header__navbar-user-menu">
                <li class="header__navbar-user-item">
                    <a href=""><i class="icon-user--admin fa-regular fa-user"></i>Tài khoản của tôi</a>
                </li>
                <li class="header__navbar-user-item header__navbar-user-item--separate">
                    <a href="#modal_confirm-logout"><i class="icon-off fa-solid fa-power-off "></i>Đăng xuất</a>
                    <!-- <a href="logout.php"><i class="icon-off fa-solid fa-power-off "></i>Đăng xuất</a> -->
                </li>
            </ul>
        </div>
    </div>
</div>