<?php
// Hàm kiểm tra chuỗi palindrome
function isPalindrome($string) {
    // Chuyển chuỗi thành chữ thường và loại bỏ các ký tự không phải là chữ cái hoặc số
    $cleanString = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $string));
    
    // So sánh chuỗi gốc với chuỗi đảo ngược
    return $cleanString === strrev($cleanString);
}

// Xử lý khi form được gửi
$palindromeResult = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận giá trị chuỗi từ form
    $inputString = $_POST["string"];
    
    // Kiểm tra nếu chuỗi là palindrome
    if (isPalindrome($inputString)) {
        $palindromeResult = "<div class='alert alert-success mt-3'>The string '$inputString' is a palindrome.</div>";
    } else {
        $palindromeResult = "<div class='alert alert-danger mt-3'>The string '$inputString' is not a palindrome.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome Checker</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Palindrome Checker</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-3">
            <div class="form-group">
                <label for="string">Enter a string:</label>
                <input type="text" class="form-control" id="string" name="string" required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>
        
        <!-- Hiển thị kết quả -->
        <?php echo $palindromeResult; ?>
    </div>

    <!-- Thêm Bootstrap JS và Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
