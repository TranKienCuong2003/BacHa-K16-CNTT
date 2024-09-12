<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bàn Cờ Vua</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Chiều cao toàn màn hình */
            margin: 0;
            background-color: #f0f0f0; /* Màu nền để làm nổi bật bàn cờ */
        }
        table {
            border-collapse: collapse;
            width: 400px; /* Kích thước tổng thể của bàn cờ */
            height: 400px; /* Kích thước tổng thể của bàn cờ */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Thêm bóng đổ đậm hơn cho viền ngoài cùng */
        }
        td {
            width: 50px; /* Chiều rộng của mỗi ô */
            height: 50px; /* Chiều cao của mỗi ô */
        }
        .white {
            background-color: white;
        }
        .black {
            background-color: black;
        }
    </style>
</head>
<body>
    <table>
        <?php
        // Sử dụng vòng lặp để tạo bàn cờ
        for ($row = 0; $row < 8; $row++) {
            echo '<tr>';
            for ($col = 0; $col < 8; $col++) {
                $class = ($row + $col) % 2 == 0 ? 'black' : 'white'; // Đổi màu ô
                echo "<td class=\"$class\"></td>";
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>
