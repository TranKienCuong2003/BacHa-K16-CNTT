<?php
session_start(); // Khởi tạo session để lưu thông tin người dùng

// Lấy dữ liệu từ form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Kiểm tra thông tin đăng nhập
if ($username === 'admin' && $password === 'Iamnotarobot@Mis2022') {
    // Lưu thông tin người dùng vào session
    $_SESSION['username'] = $username;
    // Chuyển hướng đến trang chủ
    header('Location: index.php');
    exit();
} else {
    // Thông báo lỗi nếu thông tin đăng nhập không đúng
    echo "<script>
            alert('Sai tên tài khoản hoặc mật khẩu.');
            window.location.href = 'login.html'; // Chuyển hướng trở lại trang đăng nhập
          </script>";
}
?>
