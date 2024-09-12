<?php
session_start(); // Khởi tạo session

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: login.html'); // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .welcome {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .welcome h1 {
            color: #333;
        }

        .welcome p {
            color: #555;
            margin: 20px 0;
        }

        .welcome a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .welcome a:hover {
            text-decoration: underline;
        }

        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #11167a;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }

        .logout-btn:hover {
            background-color: #153670;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="welcome">
            <h1>Chào mừng, <?php echo htmlspecialchars($username); ?>!</h1>
            <p>Đây là trang chủ của bạn. Bạn đã đăng nhập thành công.</p>
            <a href="logout.php" class="logout-btn">Đăng xuất</a>
        </div>
    </div>
</body>

</html>
