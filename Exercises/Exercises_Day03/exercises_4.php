<?php
// Khởi tạo biến và thông báo lỗi
$firstName = $lastName = $address = '';
$magazines = [];
$duration = '';
$payment = '';
$gender = '';
$error = '';
$confirmationScript = ''; // Biến này sẽ lưu mã script cần hiển thị

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
    $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $magazines = isset($_POST['magazines']) ? $_POST['magazines'] : [];
    $duration = isset($_POST['duration']) ? $_POST['duration'] : '';
    $payment = isset($_POST['payment']) ? $_POST['payment'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    // Kiểm tra dữ liệu trống
    if ($firstName === '' || $lastName === '' || $address === '') {
        $error = 'Các trường First Name, Last Name và Address không được để trống.';
    } elseif (empty($magazines)) {
        $error = 'Bạn phải chọn ít nhất một tạp chí.';
    } else {
        // Tạo thông điệp xác nhận
        $magazinesList = implode(', ', $magazines);
        $confirmationMessage = "Do you want to order $magazinesList magazins for $duration and to pay with $payment?";

        // Tạo đoạn mã JavaScript cho SweetAlert2
        $confirmationScript = "
            <script>
                Swal.fire({
                    title: 'Confirm Your Order',
                    text: '$confirmationMessage',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Thank You!',
                            text: 'Thank you very much for your order, we will supply as soon as possible the magazins for you to the address:\\nMr. $firstName $lastName\\n$address',
                            icon: 'success'
                        });
                    } else {
                        document.getElementById('lastName').focus();
                    }
                });
            </script>
        ";
    }
}

// Xử lý khi nút Reset được bấm
if (isset($_POST['reset'])) {
    // Xóa tất cả dữ liệu
    $firstName = $lastName = $address = '';
    $magazines = [];
    $duration = '';
    $payment = '';
    $gender = '';
    $error = '';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Xác Nhận Thông Tin</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Form Xác Nhận Thông Tin</h1>

        <!-- Thông báo lỗi nếu có -->
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Form nhập dữ liệu -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>">
            </div>
            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="Male" <?php echo $gender == 'Male' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="Female" <?php echo $gender == 'Female' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>">
            </div>
            <div class="form-group">
                <label>Magazines subscription:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="magazine1" name="magazines[]" value="TIME" <?php echo in_array('TIME', $magazines) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="magazine1">TIME</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="magazine2" name="magazines[]" value="Newsweek" <?php echo in_array('Newsweek', $magazines) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="magazine2">Newsweek</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="magazine3" name="magazines[]" value="Sunday" <?php echo in_array('Sunday', $magazines) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="magazine3">Sunday</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="magazine4" name="magazines[]" value="Vogue" <?php echo in_array('Vogue', $magazines) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="magazine4">Vogue</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="magazine5" name="magazines[]" value="People" <?php echo in_array('People', $magazines) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="magazine5">People</label>
                </div>
            </div>
            <div class="form-group">
                <label for="duration">Duration:</label>
                <select class="form-control" id="duration" name="duration">
                    <option value="" disabled selected>Choose...</option>
                    <option value="1 year" <?php echo $duration == '1 year' ? 'selected' : ''; ?>>1 year</option>
                    <option value="3 years" <?php echo $duration == '3 years' ? 'selected' : ''; ?>>3 years</option>
                    <option value="5 years" <?php echo $duration == '5 years' ? 'selected' : ''; ?>>5 years</option>
                </select>
            </div>
            <div class="form-group">
                <label>Payment options:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="creditCard" name="payment" value="Credit Card" <?php echo $payment == 'Credit Card' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="creditCard">Credit Card</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="cheque" name="payment" value="Cheque" <?php echo $payment == 'Cheque' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="cheque">Cheque</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="cash" name="payment" value="Cash" <?php echo $payment == 'Cash' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="cash">Cash</label>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Process</button>
            <button type="submit" name="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Chèn script xác nhận nếu có -->
    <?php echo $confirmationScript; ?>

</body>
</html>
