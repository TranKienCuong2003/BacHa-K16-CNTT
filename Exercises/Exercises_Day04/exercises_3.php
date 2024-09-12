<?php
function daysInMonth($month) {
    switch ($month) {
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
            return 31;
        case 4: case 6: case 9: case 11:
            return 30;
        case 2:
            return 28; // Không tính năm nhuận trong bài này
        default:
            return "Tháng không hợp lệ. Vui lòng nhập từ 1 đến 12.";
    }
}

while (true) {
    echo "Nhập số tháng (1-12): ";
    $input = trim(fgets(STDIN));
    $month = intval($input);

    if ($month >= 1 && $month <= 12) {
        $days = daysInMonth($month);
        echo "Số ngày trong tháng $month là: $days\n";
        break; // Kết thúc vòng lặp khi nhập hợp lệ
    } else {
        echo "Tháng không hợp lệ. Vui lòng nhập từ 1 đến 12.\n";
    }
}
?>
