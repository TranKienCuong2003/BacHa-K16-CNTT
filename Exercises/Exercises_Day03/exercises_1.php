<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f3f3;
            margin: 0;
        }

        .login {
            background: #f5f5f5;
            border-radius: 10px;
            overflow: hidden;
            width: 350px;
            text-align: center;
        }

        .login__header {
            background-color: lightgreen;
            padding: 20px;
        }

        .login__title {
            margin: 0;
            color: #333;
        }

        .login__group {
            margin: 20px;
        }

        .login__input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .login__button {
            background-color: lightgreen;
            border: none;
            padding: 10px;
            width: calc(100% - 20px);
            border-radius: 5px;
            cursor: pointer;
            color: #000;
            font-size: 16px;
        }

        .login__message--error {
            color: red;
            margin-top: 10px;
        }

        .login__message--success {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    // Khai báo biến để lưu thông báo lỗi và tên người dùng
    $error = '';
    $user = '';

    // Xử lý khi form được submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        // Kiểm tra nếu chưa nhập đủ thông tin
        if (empty($username) || empty($password)) {
            $error = 'Bạn chưa nhập đủ thông tin. Vui lòng điền đầy đủ thông tin.';
        } else {
            // Kiểm tra thông tin đăng nhập
            if ($username === 'admin' && $password === 'admin') {
                $user = $username;
            } else {
                $error = 'Thông tin đăng nhập không chính xác. Xin hãy kiểm tra lại.';
            }
        }
    }
    ?>

    <!-- Form đăng nhập -->
    <form class="login" method="POST" action="">
        <div class="login__header">
            <h2 class="login__title">Sign in</h2>
        </div>
        <div class="login__group">
            <input type="text" class="login__input" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username ?? ''); ?>" required>
        </div>
        <div class="login__group">
            <input type="password" class="login__input" name="password" placeholder="Password" value="<?php echo htmlspecialchars($password ?? ''); ?>" required>
        </div>
        <button class="login__button" type="submit">Login</button>

        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if (!empty($error)): ?>
            <p class="login__message--error"><?php echo $error; ?></p>
        <?php endif; ?>

        <!-- Hiển thị tên người dùng nếu đăng nhập thành công -->
        <?php if (!empty($user)): ?>
            <p class="login__message--success">Chào mừng bạn quay trở lại, <?php echo htmlspecialchars($user); ?>!</p>
        <?php endif; ?>
    </form>
</body>
</html>
