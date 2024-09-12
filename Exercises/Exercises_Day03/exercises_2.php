<?php
// Khởi tạo các biến và giá trị mặc định
$firstname = $lastname = $email = $gender = $state = '';
$hobbies = [];
$errorFirstname = $errorLastname = $errorEmail = $errorGender = '';
$successMessage = '';

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $gender = $_POST['gender'] ?? '';
    $state = $_POST['state'];
    $hobbies = $_POST['hobbies'] ?? [];
    $isValid = true;

    // Kiểm tra Firstname không được để trống
    if (empty($firstname)) {
        $errorFirstname = 'Firstname không được để trống';
        $isValid = false;
    }

    // Kiểm tra Lastname không được để trống
    if (empty($lastname)) {
        $errorLastname = 'Lastname không được để trống';
        $isValid = false;
    }

    // Kiểm tra Email không được để trống và đúng định dạng
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = 'Email không được để trống và phải đúng định dạng';
        $isValid = false;
    }

    // Kiểm tra Gender không được để trống
    if (empty($gender)) {
        $errorGender = 'Gender không được để trống';
        $isValid = false;
    }

    // Nếu tất cả đều hợp lệ, hiển thị thông báo thành công và thông tin người dùng nhập
    if ($isValid) {
        $successMessage = "Đăng ký thành công!<br>
        Thông tin của bạn:<br>
        Firstname: $firstname<br>
        Lastname: $lastname<br>
        Email: $email<br>
        Gender: $gender<br>
        State: $state<br>
        Hobbies: " . implode(", ", $hobbies);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation with PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Registration Form</h2>

        <!-- Hiển thị thông báo thành công -->
        <?php if ($successMessage): ?>
            <div class="alert alert-success">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <!-- Form nhập thông tin -->
        <form action="" method="POST" class="needs-validation">
            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" class="form-control <?php echo $errorFirstname ? 'is-invalid' : ''; ?>" id="firstname" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>">
                <div class="invalid-feedback"><?php echo $errorFirstname; ?></div>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" class="form-control <?php echo $errorLastname ? 'is-invalid' : ''; ?>" id="lastname" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>">
                <div class="invalid-feedback"><?php echo $errorLastname; ?></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control <?php echo $errorEmail ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <div class="invalid-feedback"><?php echo $errorEmail; ?></div>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php echo ($gender == 'Male') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php echo ($gender == 'Female') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="Other" <?php echo ($gender == 'Other') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>
                <?php if ($errorGender): ?>
                    <div class="text-danger"><?php echo $errorGender; ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <select class="form-control" id="state" name="state">
                    <option value="Johor" <?php if ($state == 'Johor') echo 'selected'; ?>>Johor</option>
                    <option value="Massachusetts" <?php if ($state == 'Massachusetts') echo 'selected'; ?>>Massachusetts</option>
                    <option value="Washington" <?php if ($state == 'Washington') echo 'selected'; ?>>Washington</option>
                </select>
            </div>
            <div class="form-group">
                <label>Hobbies:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" value="Badminton" id="hobby1" <?php echo in_array('Badminton', $hobbies) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="hobby1">Badminton</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" value="Football" id="hobby2" <?php echo in_array('Football', $hobbies) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="hobby2">Football</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" value="Bicycle" id="hobby3" <?php echo in_array('Bicycle', $hobbies) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="hobby3">Bicycle</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>

    <!-- Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
