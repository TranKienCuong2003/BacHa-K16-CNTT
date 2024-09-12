<?php
// Hàm kiểm tra số chẵn hay lẻ
function checkEvenOdd($number) {
    // Kiểm tra nếu số chia hết cho 2
    if ($number % 2 == 0) {
        return "$number là số chẵn.";
    } else {
        return "$number là số lẻ.";
    }
}

// Ví dụ sử dụng hàm
$numberToCheck = 7;
$result = checkEvenOdd($numberToCheck);

echo $result;
?>
