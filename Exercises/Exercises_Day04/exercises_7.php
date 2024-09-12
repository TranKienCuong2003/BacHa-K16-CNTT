<?php
/**
 * Hàm viết hoa chữ cái đầu tiên của mỗi từ trong chuỗi
 *
 * @param string $str Chuỗi đầu vào
 * @return string Chuỗi với chữ cái đầu tiên của mỗi từ được viết hoa
 */
function capitalize($str) {
    // Tách chuỗi thành các từ bằng cách sử dụng hàm explode
    $words = explode(' ', $str);
    
    // Duyệt qua từng từ trong mảng
    foreach ($words as &$word) {
        // Viết hoa chữ cái đầu tiên của từ
        $word = ucfirst(strtolower($word));
    }
    
    // Ghép các từ lại thành chuỗi với dấu cách giữa các từ
    return implode(' ', $words);
}

// Kiểm tra nếu form đã được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận giá trị từ form
    $inputText = $_POST['text'];
    
    // Xử lý và lưu kết quả
    $result = capitalize($inputText);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capitalize Text</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Capitalize Text</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="text">Enter text:</label>
                <input type="text" class="form-control" id="text" name="text" value="<?php echo isset($inputText) ? htmlspecialchars($inputText) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if (isset($result)) {
            echo "<h2 class='mt-4'>Result:</h2>";
            echo "<p>" . htmlspecialchars($result) . "</p>";
        }
        ?>
    </div>
</body>
</html>
