<?php
require 'database.php';

// Kiểm tra định dạng username  
function is_username($username)
{
    // Biểu thức chính quy - tên tài khoản bao gồm các ký tự A - Z a - z 0 - 9
    $partten = "/^[A-Za-z0-9\_.]{5,32}$/";
    if (!preg_match($partten, $username, $matchs))
        return false;
    return true;
}


// Kiểm tra định dạng password
function is_password($password)
{
    // Biểu thức mật khẩu A - Z viết hoa ký tự đầu tiên của mật khẩu và bao gôm các ký tự đặc biệt
    $partten = "/^([A-Z]){1}([\w_\ .!@#$%^&*()]+){5,17}$/";
    if (!preg_match($partten, $password, $matchs))
        return false;
    return true;
}

// kiểm tra định dạng số điện thoại
function is_phone($phone)
{
    $partten = "/^(09|08|01[2|6|8|9])+([0-9]{8})$/";
    if (!preg_match($partten, $phone, $matchs))
        return false;
    return true;
}

// Hàm xuất lỗi
function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field])) return "<p class='error'> {$error[$label_field]}</p>";
}

// Hàm set value 
function set_value($label_field)
{
    global $$label_field;
    if (!empty($$label_field)) return $$label_field;
}

