<?php
session_start();

if (isset($_SESSION['admin'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - Admin Dashboard - Reports</title>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="admin-body">
        <!-- nav bar start -->
        <?php include 'components/admin-nav.php'; ?>
        <!-- nav bar end -->

        <div class="col-10">
            <h2 class="text-center">Reports</h2>
            <div class="row mt-5">
                <div class="col-4">
                    <button class="btn btn-outline-info col-12">Stock report</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-outline-info col-12">Product report</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-outline-info col-12">User report</button>
                </div>
            </div>
        </div>    

        <!-- footer start -->
        <div class="fixed-bottom col-12">
                <p class="text-center">&copy; 2024 online clothing store | All rights reserved</p>
        </div>
        <!-- footer end -->

    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    </body>
    </html>
    <?php
} else {
    echo "<script>location.href='admin_signin.php'</script>";
}

?>