<?php 
session_start();
if (isset($_SESSION['admin'])){
    ?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - Admin Dashboard - Product Management</title>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="admin-body">
        <!-- nav bar start -->
        <?php include 'components/admin-nav.php'; ?>
        <!-- nav bar end -->
        <div class="col-10">
            <h2 class="text-center">Product Management</h2>
            <div class="row">
                <!-- Brand Registration start -->
                <div class="col-4 offset-1 mt-4">
                    <label for="form-lable">Brand Name:</label>
                    <input type="text" id="admin-brand" class="form-control mb-3">
                    <div class="d-none" id="admin-brand-msg-div">
                        <div class="alert alert-danger" id="admin-brand-msg"></div>
                    </div>
                    <button class="btn btn-outline-light mt-1 col-12" onclick="brandReg();">Brand register</button>
                </div>
                <!-- Brand Registration end -->

                <!-- Category Registration start -->
                <div class="col-4 offset-2 mt-4">
                    <label for="form-lable">Category Name:</label>
                    <input type="text" id="admin-category" class="form-control mb-3">
                    <div class="d-none" id="admin-category-msg-div">
                        <div class="alert alert-danger" id="admin-category-msg"></div>
                    </div>
                    <button class="btn btn-outline-light mt-1 col-12" onclick="categoryReg();">Category register</button>
                </div>
                <!-- Category Registration end -->
            </div>

            <div class="row mt-4">
                <!-- Color Registration start -->
                <div class="col-4 offset-1 mt-4">
                    <label for="form-lable">Color Name:</label>
                    <input type="text" id="admin-color" class="form-control mb-3">
                    <div class="d-none" id="admin-color-msg-div">
                        <div class="alert alert-danger" id="admin-color-msg"></div>
                    </div>
                    <button class="btn btn-outline-light mt-1 col-12" onclick="colorReg();">Color register</button>
                </div>
                <!-- Color Registration end -->

                <!-- Size Registration start -->
                <div class="col-4 offset-2 mt-4">
                    <label for="form-lable">Size Name:</label>
                    <input type="text" id="admin-size" class="form-control mb-3">
                    <div class="d-none" id="admin-size-msg-div">
                        <div class="alert alert-danger" id="admin-size-msg"></div>
                    </div>
                    <button class="btn btn-outline-light mt-1 col-12" onclick="sizeReg();">Size register</button>
                </div>
                <!-- Size Registration end -->
            </div>
        </div>

        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>
    </body>
    </html>

    <?php


} else {
    echo "<script>location.href='admin_signin.php'</script>";
}

?>
