<?php

include '../connection.php';

session_start();

$user = $_SESSION['user'];
$deliveryCharge = 500;
$netTotal = 0;

$result = Database::search("SELECT
    cart.cart_id,
    cart.cart_quantity,
    cart.user_id,
    stock.id AS stock_id,
    stock.price,
    stock.quantity AS stock_quantity,
    stock.status,
    product.id AS product_id,
    product.name AS product_name,
    product.description,
    product.image_path,
    brand.name AS brand_name,
    category.name AS category_name,
    size.name AS size_name,
    color.name AS color_name
FROM
    cart
INNER JOIN stock ON cart.stock_id = stock.id
INNER JOIN product ON stock.product_id = product.id
INNER JOIN brand ON product.brand_id = brand.id
INNER JOIN category ON product.category_id = category.id
INNER JOIN size ON product.size_id = size.id
INNER JOIN color ON product.color_id = color.id
WHERE
    cart.user_id = '" . $user['user_id'] . "';");

if ($result->num_rows > 0) {
?>
    <!-- cart loading here -->
    <div class="mt-3 mb-4">
        <h3>Shopping Cart</h3>
    </div>

    <?php
    for ($i = 0; $i < $result->num_rows; $i++) {
        $data = $result->fetch_assoc();
        $total = $data['price'] * $data['cart_quantity'];
        $netTotal += $total;
    ?>


        <!-- cart item start -->
        <div class="col-12 border border-3 rounded-5 p-3 mb-2 d-flex justify-content-between">
            <div class="d-flex align-items-center col-5">
                <img src="<?php echo $data['image_path'] ?>" class="rounded-4" width="200">
                <div class="ms-5">
                    <h4><?php echo $data['product_name'] ?></h4>
                    <p class="text-muted mb-0 mt-3">Color : <?php echo $data['color_name'] ?></p>
                    <p class="text-muted">Size : <?php echo $data['size_name'] ?></p>
                    <h5 class="text-info">Price : <?php echo $data['price'] ?> LKR</h5>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-light btn-sm" onclick="decrementCartQty(<?php echo $data['cart_id'] ?>);">-</button>
                <input type="number" id="qty-<?php echo $data['cart_id'] ?>" class="form-control form-control-sm text-center" style="max-width: 100px;" value="<?php echo $data['cart_quantity'] ?>" disabled>
                <button class="btn btn-light btn-sm" onclick="incrementCartQty(<?php echo $data['cart_id'] ?>);">+</button>
            </div>
            <div class="d-flex align-items-center">
                <h4>Total : <span class="text-info"><?php echo $total ?> LKR</span></h4>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-danger btn-sm" onclick="removeCart(<?php echo $data['cart_id'] ?>);">X</button>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="col-12 mt-4">
        <hr>
    </div>

    <!-- checkout start -->
    <div class="d-flex flex-column align-items-end">
        <h6>Number of items: <span class="text-info"><?php echo $result->num_rows ?></span></h6>
        <h5>Delivery Charge: <span class="text-info"><?php echo $deliveryCharge ?> LKR</span></h5>
        <h5>Total: <span class="text-info"><?php echo $netTotal + $deliveryCharge ?> LKR</span></h5>
        <button class="btn btn-success col-3 mt-3 mb-4">Checkout</button>
    </div>
    <!-- checkout end -->
<?php
} else {
?>
    <!-- cart loading here -->
    <div class="mt-3 mb-4">
        <h3>Shopping Cart</h3>
    </div>

    <div class="col-12 text-center mt-5">
        <h2>Your cart is empty</h2>
        <a href="home.php" class="btn btn-primary">Start shopping</a>
    </div>
<?php
}
