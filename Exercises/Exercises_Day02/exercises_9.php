<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Số nguyên tố từ 1 đến 100</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(10, 40px);
            grid-template-rows: repeat(10, 40px);
            gap: 2px;
            justify-content: center;
            border: 2px solid #000;
            padding: 2px;
            background-color: #fff;
        }
        .box {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 400;
            border: 1px solid #000;
        }
        .prime {
            background-color: lightgreen;
        }
        .non-prime {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Hàm kiểm tra số nguyên tố
        function isPrime($num) {
            if ($num <= 1) return false;
            if ($num == 2) return true;
            if ($num % 2 == 0) return false;
            for ($i = 3; $i <= sqrt($num); $i += 2) {
                if ($num % $i == 0) return false;
            }
            return true;
        }

        // Vòng lặp để tạo các ô vuông từ 1 đến 100
        for ($i = 1; $i <= 100; $i++) {
            $class = isPrime($i) ? 'prime' : 'non-prime'; // Xác định lớp CSS
            echo "<div class='box $class'>$i</div>";
        }
        ?>
    </div>
</body>
</html>
