<?php
// Khởi tạo biến cho chuỗi và số lượng nguyên âm
$inputString = '';
$vowelCount = 0;

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inputString'])) {
    $inputString = $_POST['inputString'];

    // Chuyển chuỗi thành chữ thường
    $lowercaseString = strtolower($inputString);

    // Đếm số lượng nguyên âm
    $vowels = array('a', 'e', 'i', 'o', 'u');
    $vowelCount = 0;

    // Duyệt qua từng ký tự trong chuỗi
    for ($i = 0; $i < strlen($lowercaseString); $i++) {
        if (in_array($lowercaseString[$i], $vowels)) {
            $vowelCount++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đếm Nguyên Âm</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Đếm Nguyên Âm Trong Chuỗi</h1>
        
        <!-- Form nhập chuỗi -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="inputString">Nhập Chuỗi:</label>
                <input type="text" class="form-control" id="inputString" name="inputString" value="<?php echo htmlspecialchars($inputString); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Tính Số Nguyên Âm</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <div class="mt-4">
                <h2>Kết Quả</h2>
                <p>Chuỗi nhập vào (đã chuyển thành chữ thường): <strong><?php echo htmlspecialchars($lowercaseString); ?></strong></p>
                <p>Số lượng nguyên âm: <strong><?php echo $vowelCount; ?></strong></p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Thêm Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
