<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: login_success.php");
    exit;
}

// Kiểm tra cookie và tự động đăng nhập nếu cookie còn hạn
if (isset($_COOKIE['username']) && !isset($_SESSION['loggedin'])) {
    $_SESSION['loggedin'] = true;
    header("Location: login_success.php");
    exit;
}

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if (empty($username) || empty($password)) {
        $message = 'Không được để trống username hoặc password';
    } elseif ($username === 'admin' && $password === '123456') {
        $_SESSION['loggedin'] = true;
        
        if ($remember) {
            setcookie('username', $username, time() + 30); // Cookie sống 30 giây
        } else {
            setcookie('username', '', time() - 3600); // Xóa cookie nếu không chọn Remember me
        }

        header("Location: login_success.php");
        exit;
    } else {
        $message = 'Tên đăng nhập hoặc mật khẩu không đúng.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Màu nền cho toàn trang */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: lightblue; /* Màu nền cho container */
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%; /* Chiều rộng 90% để phù hợp với các màn hình nhỏ */
            max-width: 400px; /* Chiều rộng tối đa của container */
        }
        .btn-primary {
            text-transform: uppercase;
            background-color: lightgreen;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if ($message): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
