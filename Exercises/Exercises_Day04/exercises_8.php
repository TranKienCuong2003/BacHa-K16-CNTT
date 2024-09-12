<?php
/**
 * Hàm kiểm tra xem hai chuỗi có phải là anagram của nhau hay không
 *
 * @param string $str1 Chuỗi thứ nhất
 * @param string $str2 Chuỗi thứ hai
 * @return bool True nếu là anagram, false nếu không phải
 */
function checkAnagram($str1, $str2) {
    // Loại bỏ các ký tự không phải là chữ cái và chuyển đổi tất cả thành chữ thường
    $str1 = strtolower(preg_replace('/[^a-z]/', '', $str1));
    $str2 = strtolower(preg_replace('/[^a-z]/', '', $str2));
    
    // So sánh độ dài của hai chuỗi
    if (strlen($str1) !== strlen($str2)) {
        return false;
    }

    // Sắp xếp các ký tự trong chuỗi
    $str1 = str_split($str1);
    $str2 = str_split($str2);
    sort($str1);
    sort($str2);

    // So sánh các ký tự đã sắp xếp
    return $str1 === $str2;
}

// Kiểm tra nếu form đã được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận giá trị từ form
    $string1 = $_POST['string1'];
    $string2 = $_POST['string2'];
    
    // Xử lý và lưu kết quả
    $isAnagram = checkAnagram($string1, $string2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Anagram</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Check Anagram</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="string1">Enter first string:</label>
                <input type="text" class="form-control" id="string1" name="string1" value="<?php echo isset($string1) ? htmlspecialchars($string1) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="string2">Enter second string:</label>
                <input type="text" class="form-control" id="string2" name="string2" value="<?php echo isset($string2) ? htmlspecialchars($string2) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>
        <?php
        if (isset($isAnagram)) {
            if ($isAnagram) {
                echo "<h2 class='mt-4'>The strings are anagrams!</h2>";
            } else {
                echo "<h2 class='mt-4'>The strings are not anagrams.</h2>";
            }
        }
        ?>
    </div>
</body>
</html>
