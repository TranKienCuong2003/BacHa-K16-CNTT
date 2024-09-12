<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION['error'] = 'Bạn cần đăng nhập để có thể truy cập trang này';
    header("Location: index.php");
    exit;
}

// Xử lý đăng xuất
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    setcookie('username', '', time() - 3600); // Xóa cookie
    $_SESSION['message'] = 'Bạn đã đăng xuất khỏi hệ thống';
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Đăng nhập thành công!</h2>
        <p>Chào mừng bạn, <?php echo htmlspecialchars('admin'); ?></p>
        <p>Thời gian hiện tại đang login: <?php echo date('d/m/Y H:i:s'); ?></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>
