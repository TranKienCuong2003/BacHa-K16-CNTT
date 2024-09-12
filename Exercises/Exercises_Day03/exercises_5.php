<?php
// Khởi tạo biến và thông báo lỗi
$a = $b = '';
$error = '';
$result = '';

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $a = isset($_POST['a']) ? trim($_POST['a']) : '';
    $b = isset($_POST['b']) ? trim($_POST['b']) : '';
    
    // Kiểm tra dữ liệu trống
    if ($a === '' || $b === '') {
        $error = 'Không được để trống số a hoặc số b';
        $result = 'Không được phép tính toán';
    }
    // Kiểm tra dữ liệu có phải là số không
    elseif (!is_numeric($a) || !is_numeric($b)) {
        $error = 'Chỉ cho phép nhập số';
        $result = 'Không được phép tính toán';
    } else {
        // Nếu không có lỗi, thực hiện phép tính dựa trên nút submit
        $a = floatval($a);
        $b = floatval($b);

        if (isset($_POST['add'])) {
            $result = $a + $b;
        } elseif (isset($_POST['subtract'])) {
            $result = $a - $b;
        } elseif (isset($_POST['multiply'])) {
            $result = $a * $b;
        } elseif (isset($_POST['divide'])) {
            if ($b != 0) {
                $result = $a / $b;
            } else {
                $error = 'Không thể chia cho 0';
                $result = 'Không được phép tính toán';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máy tính cơ bản</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Thực hành toán tử</h1>

        <!-- Thông báo lỗi nếu có -->
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Form nhập dữ liệu -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="a">Số a:</label>
                <input type="text" class="form-control" id="a" name="a" value="<?php echo htmlspecialchars($a); ?>">
            </div>
            <div class="form-group">
                <label for="b">Số b:</label>
                <input type="text" class="form-control" id="b" name="b" value="<?php echo htmlspecialchars($b); ?>">
            </div>
            <button type="submit" name="add" class="btn btn-primary">Cộng</button>
            <button type="submit" name="subtract" class="btn btn-secondary">Trừ</button>
            <button type="submit" name="multiply" class="btn btn-success">Nhân</button>
            <button type="submit" name="divide" class="btn btn-danger">Chia</button>
        </form>

        <!-- Kết quả -->
        <?php if ($result !== ''): ?>
            <div class="mt-4">
                <h2>Kết Quả</h2>
                <p><strong><?php echo $result; ?></strong></p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Thêm Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
