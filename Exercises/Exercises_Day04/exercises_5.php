<?php
// Hàm đảo ngược số hoặc chuỗi
function reverse($input) {
    // Kiểm tra nếu đầu vào là số
    if (is_numeric($input)) {
        // Chuyển số thành chuỗi
        $inputStr = strval($input);
        
        // Nếu là số âm, giữ dấu âm ở đầu và đảo ngược phần còn lại
        if ($inputStr[0] === '-') {
            return '-' . strrev(substr($inputStr, 1));
        } else {
            return strrev($inputStr);
        }
    } else {
        // Nếu không phải số, chỉ đảo ngược chuỗi
        return strrev($input);
    }
}

// Xử lý khi form được gửi
$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận giá trị từ form
    $input = $_POST["input"];
    
    // Đảo ngược giá trị
    $result = reverse($input);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reverse String or Number</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Reverse String or Number</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-3">
            <div class="form-group">
                <label for="input">Enter a number or string:</label>
                <input type="text" class="form-control" id="input" name="input" required>
            </div>
            <button type="submit" class="btn btn-primary">Reverse</button>
        </form>
        
        <!-- Hiển thị kết quả -->
        <?php if ($result !== ''): ?>
            <div class='alert alert-info mt-3'>
                <strong>Reversed Result:</strong> <?php echo htmlspecialchars($result); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Thêm Bootstrap JS và Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
