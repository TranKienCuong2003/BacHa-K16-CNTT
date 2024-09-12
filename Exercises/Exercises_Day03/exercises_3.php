<?php
// Khởi tạo các biến và giá trị mặc định
$name = $email = $phone = $website = $message = '';
$error = '';
$successMessage = '';

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $website = trim($_POST['website']);
    $message = trim($_POST['message']);
    $isValid = true;

    // Kiểm tra các trường không được để trống
    if (empty($name) || empty($email) || empty($phone) || empty($website) || empty($message)) {
        $error = 'Không được để trống các trường';
        $isValid = false;
    }

    // Kiểm tra định dạng email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email không đúng định dạng';
        $isValid = false;
    }

    // Kiểm tra định dạng số điện thoại
    if (!preg_match('/^[0-9]+$/', $phone)) {
        $error = 'Số điện thoại chỉ được chứa số';
        $isValid = false;
    }

    // Kiểm tra định dạng URL cho website
    if (!filter_var($website, FILTER_VALIDATE_URL)) {
        $error = 'Trường website cần phải có định dạng URL';
        $isValid = false;
    }

    // Nếu tất cả đều hợp lệ, hiển thị thông báo thành công và thông tin người dùng nhập
    if ($isValid) {
        $successMessage = "Send contact thành công!<br>
        Your name: $name<br>
        Your email: $email<br>
        Your phone number: $phone<br>
        Your Website: $website<br>
        Your message: $message";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Validation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Contact Form</h1>

        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Hiển thị thông báo thành công -->
        <?php if ($successMessage): ?>
            <div class="alert alert-success">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <!-- Form nhập thông tin -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" id="website" name="website" value="<?php echo htmlspecialchars($website); ?>">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message"><?php echo htmlspecialchars($message); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
