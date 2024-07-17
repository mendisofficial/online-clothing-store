<?php
include 'connection.php';

session_start();
$user = $_SESSION['user'];

if (!isset($user)) {
    echo "<script>location.href='index.php'</script>";
} else {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - </title>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <!-- nav bar start -->
        <?php include 'components/nav.php'; ?>
        <!-- nav bar end -->

        <div class="container mt-5">
            <div class="row" id="cart-body">
                <!-- cart loading here -->
                <div class="mt-3 mb-4">
                    <h3>Shopping Cart</h3>
                </div>

                <!-- cart item start -->
                <div class="col-12 border border-3 rounded-5 p-3 mb-2 d-flex justify-content-between">
                    <div class="d-flex align-items-center col-5">
                        <img src="assets/img/products/66921956ebb04.png" class="rounded-4" width="200">
                        <div class="ms-5">
                            <h4>Product name</h4>
                            <p class="text-muted mb-0 mt-3">Color : Red</p>
                            <p class="text-muted">Size : XL</p>
                            <h5 class="text-info">Price : 1500 LKR</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-light btn-sm">-</button>
                        <input type="number" class="form-control form-control-sm text-center" style="max-width: 100px;" disabled>
                        <button class="btn btn-light btn-sm">+</button>
                    </div>
                    <div class="d-flex align-items-center">
                        <h4>Total : <span class="text-info">1500 LKR</span></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-danger btn-sm">X</button>
                    </div>
                </div>
                <!-- cart item end -->

                <div class="col-12 mt-4">
                    <hr>
                </div>

                <!-- checkout start -->
                <div class="d-flex flex-column align-items-end">
                    <h6>Number of items: <span class="text-info">1</span></h6>
                    <h5>Delivery Charge: <span class="text-info">200 LKR</span></h5>
                    <h5>Total: <span class="text-info">1700 LKR</span></h5>
                    <button class="btn btn-success col-3 mt-3 mb-4">Checkout</button>
                </div>
                <!-- checkout end -->

                <div class="col-12 text-center mt-5">
                    <h2>Your cart is empty</h2>
                    <a href="home.php" class="btn btn-primary">Start shopping</a>
                </div>
            </div>
        </div>


        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>
    </body>

    </html>


<?php
}
?>