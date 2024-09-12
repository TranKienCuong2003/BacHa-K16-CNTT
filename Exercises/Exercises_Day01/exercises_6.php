<?php
// Yêu cầu người dùng nhập giá trị từ bàn phím
echo "Nhập giá trị (0-6): ";

// Đọc dữ liệu từ bàn phím
$handle = fopen("php://stdin", "r");
$day = intval(trim(fgets($handle)));

// Đóng file handle
fclose($handle);

// Xử lý theo giá trị của biến $day
switch ($day) {
    case 0:
        echo "Ngày thứ hai.";
        break;
    case 1:
        echo "Ngày thứ ba.";
        break;
    case 2:
        echo "Ngày thứ tư.";
        break;
    case 3:
        echo "Ngày thứ năm.";
        break;
    case 4:
        echo "Ngày thứ sáu.";
        break;
    case 5:
        echo "Ngày thứ bảy.";
        break;
    case 6:
        echo "Ngày Chủ nhật.";
        break;
    default:
        echo "Không hợp lệ.";
        break;
}
?>
