<?php
session_start();
$user = $_SESSION["user"];

if (!isset($user)) {
    echo "<script>location.href='index.php'</script>";
} else {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - User Profile - </title>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <!-- nav bar start -->
        <?php include 'components/nav.php'; ?>
        <!-- nav bar end -->

        <div class="admin-body">
            <div class="row container mt-5">
                <div class="col-4 d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-center">
                        <img src="assets/img/profile.png" height="200px">
                    </div>
                    <div class="mt-3">
                        <label for="from-label">Prifile Image</label>
                        <input type="file" class="form-control" id="imgUploader" />
                    </div>
                    <div>
                        <button class="btn btn-outline-info col-12 mt-4">Upload</button>
                    </div>
                </div>
                <div class="col-8">
                    <h2 class="text-center">Profile Details</h2>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control" value="" id="fname" />
                        </div>
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control" value="" id="lname" />
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Email</label>
                        <input type="text" class="form-control" value="" id="email">
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Mobile</label>
                        <input type="text" class="form-control" value="" id="mobile">
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">Username</label>
                            <input type="text" class="form-control" value="" disabled>
                        </div>
                        <div class="col-6">
                            <label for="form-label">Password</label>
                            <input type="password" class="form-control" value="" id="pw">
                        </div>
                    </div>
                    <h5 class="mt-3">Shipping Address</h5>

                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="form-label">No</label>
                            <input type="text" class="form-control" id="no">
                        </div>
                        <div class="col-9">
                            <label for="form-label">Street</label>
                            <input type="text" class="form-control" id="line1">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="form-label">City</label>
                        <input type="text" class="form-control" id="line2">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-outline-info col-12" onclick="updateData();">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer start -->
        <div class="col-12 mt-3">
            <p class="text-center">&copy; 2024 online clothing store | All rights reserved</p>
        </div>
        <!-- footer end -->

        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>
    </body>

    </html>

<?php
}
?>