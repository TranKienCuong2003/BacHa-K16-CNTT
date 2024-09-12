<?php
session_start();

// Xử lý khi người dùng xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['code'])) {
    $code = $_GET['code'];
    if (isset($_SESSION['cart'][$code])) {
        unset($_SESSION['cart'][$code]);
    }
}

header('Location: index.php');
exit();
?>
