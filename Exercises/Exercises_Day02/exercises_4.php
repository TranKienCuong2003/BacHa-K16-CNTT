<?php
// Khởi tạo biến
$sum = 0;
$square_sum = 0;
$i = 1;

// Tính tổng và tổng bình phương của các số nguyên đầu tiên
while ($i <= 100) {
    // Cộng dồn tổng
    $sum += $i;
    
    // Cộng dồn tổng bình phương
    $square_sum += $i * $i;
    
    // Nếu biến đếm đạt đến giá trị 50, kết thúc vòng lặp
    if ($i == 50) {
        break;
    }
    
    // Tăng giá trị của biến đếm
    $i++;
}

// In kết quả
echo "Tổng của các số nguyên từ 1 đến 50 là: $sum\n";
echo "Tổng bình phương của các số nguyên từ 1 đến 50 là: $square_sum\n";
?>
