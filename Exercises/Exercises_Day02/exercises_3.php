<?php
// Khởi tạo biến
$sum = 0;
$i = 1;

// Tính tổng của 100 số nguyên đầu tiên sử dụng vòng lặp while
while ($i <= 100) {
    $sum += $i;
    $i++;
}

// In kết quả
echo "Tổng của 100 số nguyên đầu tiên (1-100) là: $sum\n";
?>

<?php
// Khởi tạo biến
$i = 20;

// In ra những số chia hết cho 3 trong khoảng từ 20-50
while ($i <= 50) {
    if ($i % 3 == 0) {
        echo "$i\n";
    }
    $i++;
}
?>
