<?php
// Chuỗi mẫu
$email = 'rayy@example.com';

// Tìm vị trí của ký tự '@' trong chuỗi
$at_position = strpos($email, '@');

// Kiểm tra nếu ký tự '@' tồn tại trong chuỗi
if ($at_position !== false) {
    // Tách phần tên người dùng bằng cách sử dụng substr()
    $username = substr($email, 0, $at_position);
    
    // In kết quả
    echo "Tên người dùng là: $username\n";
} else {
    echo "Chuỗi không chứa ký tự '@'.\n";
}
?>
