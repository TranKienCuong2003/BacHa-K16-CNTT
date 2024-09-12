<?php
session_start();

// Danh sách sản phẩm mẫu
$products = [
    [
        'code' => 'P001',
        'name' => 'Áo Khoác Hoodie nam khóa kéo - Hoodie ZIP, chất nỉ dày, không mũ to, thêu chữ trước Ngực, Thời trang unisex',
        'price' => 139000,
        'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-llxjneel8q1rc4.webp'
    ],
    [
        'code' => 'P002',
        'name' => 'Omega - SWATCH Hợp tác ba bên Snoopy Couple Watch Planet Watch Super Nightlight Edition',
        'price' => 530000,
        'image' => 'https://down-vn.img.susercontent.com/file/cn-11134207-7r98o-lvy1a6qtilol4d.webp'
    ],
    [
        'code' => 'P003',
        'name' => 'Nệm Topper Euro Hometex dày 7cm tấm topper tiện nghi cao cấp không lo bị xẹp gấp gọn gàng khi không sử dụng',
        'price' => 469000,
        'image' => 'https://down-vn.img.susercontent.com/file/vn-11134201-23020-22k6m7lup3nv0a.webp'
    ],
    [
        'code' => 'P004',
        'name' => 'Set Chè Dưỡng Nhan Tuyết yến 15 Vị 300g',
        'price' => 26500,
        'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lhyobe1ddfpd1f.webp'
    ]
];

// Xử lý khi thêm sản phẩm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $code = $_POST['code'];
    $quantity = $_POST['quantity'];

    // Tìm sản phẩm theo mã code
    foreach ($products as $product) {
        if ($product['code'] == $code) {
            $cartItem = [
                'code' => $product['code'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'image' => $product['image']
            ];

            // Thêm sản phẩm vào giỏ hàng
            $_SESSION['cart'][$code] = $cartItem;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .cart-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .card-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: clamp(3rem, 4vw, 4rem);
        }

        .cart-table {
            width: 100%;
            margin-top: 20px;
        }

        .cart-total {
            font-weight: bold;
        }

        .remove-btn {
            color: red;
            cursor: pointer;
            font-size: 28px; /* Tăng kích thước font cho dấu X */
            line-height: 1;
            display: flex;
            justify-content: flex-end; /* Căn chỉnh dấu X sang phải */
            padding-right: 10px; /* Tạo thêm khoảng cách giữa dấu X và nội dung khác */
        }

        .remove-btn:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Products</h1>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="<?= $product['image']; ?>" class="card-img-top product-image" alt="<?= $product['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name']; ?></h5>
                            <p class="card-text"><?= number_format($product['price']); ?> VND</p>
                            <form method="POST" action="">
                                <input type="hidden" name="code" value="<?= $product['code']; ?>">
                                <input type="number" name="quantity" value="1" min="1" class="form-control mb-2">
                                <button type="submit" name="add_to_cart" class="btn btn-primary btn-block">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="mb-4">Shopping Cart</h2>
        <?php if (!empty($_SESSION['cart'])) : ?>
            <table class="table table-bordered cart-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Unit Price</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $item) : ?>
                        <tr>
                            <td><img src="<?= $item['image']; ?>" class="cart-image" alt="<?= $item['name']; ?>"></td>
                            <td><?= $item['name']; ?></td>
                            <td><?= $item['code']; ?></td>
                            <td><?= $item['quantity']; ?></td>
                            <td><?= number_format($item['price']); ?> VND</td>
                            <td><?= number_format($item['price'] * $item['quantity']); ?> VND</td>
                            <td><a href="cart.php?action=remove&code=<?= $item['code']; ?>" class="remove-btn">&times;</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right cart-total">Total:</td>
                        <td colspan="2"><?= number_format(calculateTotal()); ?> VND</td>
                    </tr>
                </tfoot>
            </table>
        <?php else : ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>

</html>

<?php
// Tính tổng tiền trong giỏ hàng
function calculateTotal()
{
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    }
    return $total;
}
?>
