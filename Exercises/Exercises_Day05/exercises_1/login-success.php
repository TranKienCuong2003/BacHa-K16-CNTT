<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<p>Cần đăng nhập để thực hiện chức năng này</p>";
    header('Refresh: 5; url=login.php', true, 303);
    exit;
}

// Xử lý đăng xuất
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    $_SESSION['message'] = 'Đăng xuất thành công';
    header("Location: login.php");
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
        <h2>Welcome</h2>
        <p>Username: <?php echo htmlspecialchars('camnh'); ?></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>
