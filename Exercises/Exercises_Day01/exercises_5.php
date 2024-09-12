<?php
// Khai báo số KW tiêu thụ điện
$soKwTieuThu = 350; // Thay đổi giá trị này để thử nghiệm

// Khai báo hằng số VAT
define('VAT', 0.10);

// Hàm tính tiền điện theo bậc giá
function calculateElectricityBill($soKw) {
    $giaTien = 0;

    // Tính tiền cho từng bậc giá
    if ($soKw > 1000) {
        $giaTien += ($soKw - 1000) * 1200;
        $soKw = 1000;
    }
    if ($soKw > 500) {
        $giaTien += ($soKw - 500) * 1000;
        $soKw = 500;
    }
    if ($soKw > 300) {
        $giaTien += ($soKw - 300) * 900;
        $soKw = 300;
    }
    if ($soKw > 200) {
        $giaTien += ($soKw - 200) * 750;
        $soKw = 200;
    }
    if ($soKw > 100) {
        $giaTien += ($soKw - 100) * 600;
        $soKw = 100;
    }
    $giaTien += $soKw * 450;

    return $giaTien;
}

// Tính tổng tiền điện và tiền sau thuế VAT
$tienDienTruocThue = calculateElectricityBill($soKwTieuThu);
$tienDienSauThue = $tienDienTruocThue * (1 + VAT);

// In kết quả
echo "Số KW tiêu thụ: $soKwTieuThu<br/>";
echo "Tiền điện trước thuế VAT: " . number_format($tienDienTruocThue, 0, ',', '.') . " VNĐ<br/>";
echo "Tiền điện sau thuế VAT: " . number_format($tienDienSauThue, 0, ',', '.') . " VNĐ<br/>";
?>
