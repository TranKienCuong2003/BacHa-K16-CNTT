<?php
// Định nghĩa giá trị n
$n = 50;

// Khởi tạo mảng để lưu các số
$numbers = [];

// Lặp từ 1 đến n để thêm số vào mảng
for ($i = 1; $i <= $n; $i++) {
    $numbers[] = $i;
}

// Kết hợp các số trong mảng thành chuỗi, phân cách bởi ký tự "–"
$result = implode(" – ", $numbers);

// In kết quả
echo $result . "\n";
?>
