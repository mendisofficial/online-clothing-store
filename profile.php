<?php

include "connection.php";

session_start();
$user = $_SESSION["user"];

if (!isset($user)) {
    echo "<script>location.href='index.php'</script>";
} else {
    $result = Database::search("SELECT * FROM `user` WHERE `user_id` = '" . $user["user_id"] . "'");
    $data = $result->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - User Profile - <?php echo $data["username"] ?></title>
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
                        <img src="<?php
                                    if (!empty($data["image_path"])) {
                                        echo $data["image_path"];
                                    } else {
                                        echo ("assets/img/profile.png");
                                    }
                                    ?>" height="200px">
                    </div>
                    <div class="mt-3">
                        <label for="from-label">Prifile Image</label>
                        <input type="file" class="form-control" id="imgUploader" />
                    </div>
                    <div>
                        <button class="btn btn-outline-info col-12 mt-3" onclick="profileImage();">Upload</button>
                    </div>
                    <div class="mt-3 d-none" id="profile-image-msg-div">
                        <div class="alert alert-danger" id="profile-image-msg"></div>
                    </div>
                    
                </div>
                <div class="col-8">
                    <h2 class="text-center">Profile Details</h2>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $data["fname"] ?>" id="fname" />
                        </div>
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $data["lname"] ?>" id="lname" />
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo $data["email"] ?>" id="email">
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Mobile</label>
                        <input type="text" class="form-control" value="<?php echo $data["mobile"] ?>" id="mobile">
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">Username</label>
                            <input type="text" class="form-control" value="<?php echo $data["username"] ?>" disabled>
                        </div>
                        <div class="col-6">
                            <label for="form-label">Password</label>
                            <input type="password" class="form-control" value="<?php echo $data["password"] ?>" id="pw">
                        </div>
                    </div>
                    <h5 class="mt-3">Shipping Address</h5>

                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="form-label">No</label>
                            <input type="text" class="form-control" id="no" value="<?php echo $data["address_number"] ?>">
                        </div>
                        <div class="col-9">
                            <label for="form-label">Street</label>
                            <input type="text" class="form-control" id="line1" value="<?php echo $data["address_street"] ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="form-label">City</label>
                        <input type="text" class="form-control" id="line2" value="<?php echo $data["address_city"] ?>">
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