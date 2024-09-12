<?php
// Nhập số n từ bàn phím
echo "Nhập số n: ";
$n = intval(fgets(STDIN));

// Kiểm tra số n hợp lệ
if ($n > 0) {
    echo "Kết quả:\n";
    // Sử dụng vòng lặp for để in các số từ 1 đến n
    for ($i = 1; $i <= $n; $i++) {
        echo $i . "\n";
    }
} else {
    echo "Vui lòng nhập một số nguyên dương.";
}
?>
