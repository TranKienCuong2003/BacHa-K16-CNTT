<?php
// Hàm tính tổng của hai số
function calculateSum($a, $b) {
    if ($a == $b) {
        return ($a + $b) * 3;
    } else {
        return $a + $b;
    }
}

// Kiểm tra giá trị của hai số a và b
$a = 2;
$b = 2;

// Gọi hàm và in kết quả ra màn hình
$result = calculateSum($a, $b);
echo "Tổng = " . $result;
?>
