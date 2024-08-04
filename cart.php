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
        <title>Online Clothing Store - <?php echo $user['fname'] ?>'s cart</title>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body onload="loadCart();">
        <!-- nav bar start -->
        <?php include 'components/nav.php'; ?>
        <!-- nav bar end -->

        <div class="container mt-5">
            <div class="row" id="cart-body">                
            </div>
        </div>


        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>
    </body>

    </html>


<?php
}
?>