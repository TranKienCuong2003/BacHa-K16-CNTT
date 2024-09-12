<?php
// Khai báo mảng số nguyên
$array = [5, 3, 8, 1, 9, 4, 2, 7]; // Bạn có thể thay đổi các giá trị trong mảng

// Tìm giá trị lớn nhất và nhỏ nhất trong mảng
$max = max($array);
$min = min($array);

// Tính trung bình cộng của các phần tử trong mảng
$sum = array_sum($array);
$count = count($array);
$average = $count > 0 ? $sum / $count : 0;

// In kết quả
echo "Mảng: [" . implode(", ", $array) . "]\n";
echo "Giá trị lớn nhất: $max\n";
echo "Giá trị nhỏ nhất: $min\n";
echo "Trung bình cộng: " . number_format($average, 2) . "\n";
?>
