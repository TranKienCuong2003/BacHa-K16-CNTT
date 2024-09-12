<?php

/**
 * Hàm chia mảng thành các mảng con với số phần tử nhất định
 *
 * @param array
 * @param int
 * @return array
 */
function group($array, $size) {
    // Kiểm tra xem $size có hợp lệ không
    if ($size <= 0) {
        return "Kích thước nhóm phải lớn hơn 0.";
    }
    
    // Mảng chứa kết quả
    $result = [];
    
    // Số lượng phần tử trong mảng
    $length = count($array);
    
    // Sử dụng vòng lặp để chia mảng thành các nhóm
    for ($i = 0; $i < $length; $i += $size) {
        // Cắt mảng từ vị trí $i với độ dài $size
        $result[] = array_slice($array, $i, $size);
    }
    
    return $result;
}

// Ví dụ sử dụng hàm
$example1 = group([1, 2, 3, 4, 5], 2);
$example2 = group([1, 2, 3, 4, 5], 3);
$example3 = group([1, 2, 3, 4, 5], 6);

// Hiển thị kết quả
echo "Kết quả 1: <br>";
print_r($example1);
echo "<br><br>";

echo "Kết quả 2: <br>";
print_r($example2);
echo "<br><br>";

echo "Kết quả 3: <br>";
print_r($example3);
echo "<br>";

?>
