<?php
// Khai báo các biến và hằng số
$maSanPham = "EV2009";
$tenSanPham = "Tấm hợp kim nhôm ngoài trời EV2009";
$soLuong = 500;
$donGia = 160000;
define('VAT', 0.05);

// Tính toán giá trước và sau thuế VAT
$giaTruocThue = $soLuong * $donGia;
$giaSauThue = $giaTruocThue * (1 + VAT);

// In thông tin sản phẩm
echo "Mã sản phẩm: $maSanPham<br/>";
echo "Tên sản phẩm: $tenSanPham<br/>";
echo "Số lượng: $soLuong<br/>";
echo "Đơn giá: " . number_format($donGia, 0, ',', '.') . "<br/>";
echo "Giá trước thuế VAT: " . number_format($giaTruocThue, 0, ',', '.') . "<br/>";
echo "Giá sau thuế VAT: " . number_format($giaSauThue, 0, ',', '.') . "<br/>";
?>
