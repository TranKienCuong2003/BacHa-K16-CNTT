<?php
// Hàm thực hiện các phép toán cơ bản
function basicOperations($a, $b) {
    // Tính tổng
    $sum = $a + $b;
    
    // Tính hiệu
    $difference = $a - $b;
    
    // Tính tích
    $product = $a * $b;
    
    // Tính thương và phép chia dư
    // Kiểm tra chia cho 0 để tránh lỗi
    if ($b != 0) {
        $quotient = $a / $b;
        $remainder = $a % $b;
    } else {
        $quotient = "Không thể chia cho 0";
        $remainder = "Không thể chia cho 0";
    }
    
    return array(
        "Tổng" => $sum,
        "Hiệu" => $difference,
        "Tích" => $product,
        "Thương" => $quotient,
        "Chia dư" => $remainder
    );
}

// Ví dụ sử dụng hàm
$a = 15;
$b = 3;
$results = basicOperations($a, $b);

// Hiển thị kết quả
echo "Kết quả các phép toán cơ bản với a = $a và b = $b:<br>";
echo "Tổng: " . $results["Tổng"] . "<br>";
echo "Hiệu: " . $results["Hiệu"] . "<br>";
echo "Tích: " . $results["Tích"] . "<br>";
echo "Thương: " . $results["Thương"] . "<br>";
echo "Chia dư: " . $results["Chia dư"] . "<br>";
?>
