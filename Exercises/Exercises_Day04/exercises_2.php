<?php
// Hàm đếm số lần xuất hiện của mỗi từ
function countWords($str) {
    // Chuyển chuỗi về chữ thường
    $str = strtolower($str);

    // Loại bỏ các ký tự đặc biệt và chỉ giữ lại chữ cái và số
    $str = preg_replace('/[^a-z0-9\s]/', '', $str);

    // Tách chuỗi thành các từ
    $words = explode(' ', $str);

    // Tạo một mảng associative để lưu số lần xuất hiện của mỗi từ
    $wordCount = [];

    foreach ($words as $word) {
        // Bỏ qua các từ rỗng (trong trường hợp có nhiều khoảng trắng liên tiếp)
        if (trim($word) === '') {
            continue;
        }
        // Đếm số lần xuất hiện của từ
        if (isset($wordCount[$word])) {
            $wordCount[$word]++;
        } else {
            $wordCount[$word] = 1;
        }
    }

    return $wordCount;
}

// Khởi tạo biến để lưu kết quả
$wordCount = [];

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $inputString = isset($_POST['inputString']) ? $_POST['inputString'] : '';

    // Gọi hàm countWords và lưu kết quả
    $wordCount = countWords($inputString);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Count Form</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Count Words in String</h1>

        <!-- Form nhập dữ liệu -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="inputString">Enter a string:</label>
                <textarea class="form-control" id="inputString" name="inputString" rows="5"><?php echo isset($inputString) ? htmlspecialchars($inputString) : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if (!empty($wordCount)): ?>
            <h2 class="mt-5">Results</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Word</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wordCount as $word => $count): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($word); ?></td>
                            <td><?php echo htmlspecialchars($count); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Thêm Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
