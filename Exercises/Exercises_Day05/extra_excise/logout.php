<?php
session_start(); // Khởi tạo session

// Xóa tất cả các biến session
session_unset();

// Hủy session
session_destroy();

// Chuyển hướng về trang đăng nhập
header('Location: login.html');
exit();
?>
