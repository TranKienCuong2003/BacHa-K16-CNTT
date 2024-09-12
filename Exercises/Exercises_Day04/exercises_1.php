<?php
function countWords($str) {
    // Chuyển chuỗi về chữ thường
    $str = strtolower($str);

    // Loại bỏ các ký tự đặc biệt và chỉ giữ lại chữ cái và số
    $str = preg_replace('/[^a-z0-9\s]/', '', $str);

    // Tách chuỗi thành các từ
    $words = explode(' ', $str);

    // Tạo một mảng associative để lưu số lần xuất hiện của mỗi từ
    $wordCount = [];

    foreach ($words as $word) {
        // Bỏ qua các từ rỗng (trong trường hợp có nhiều khoảng trắng liên tiếp)
        if (trim($word) === '') {
            continue;
        }
        // Đếm số lần xuất hiện của từ
        if (isset($wordCount[$word])) {
            $wordCount[$word]++;
        } else {
            $wordCount[$word] = 1;
        }
    }

    return $wordCount;
}

// Ví dụ sử dụng
$str = "Write a function countWords(\$str) that takes any string of characters and finds the number of times each string occurs.";
$result = countWords($str);

// In kết quả
echo "<pre>";
print_r($result);
echo "</pre>";
?>
