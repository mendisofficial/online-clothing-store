<?php
session_start();

include 'connection.php';

if (isset($_SESSION['admin'])) {
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Store - Admin Dashboard - Stock Management</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="admin-body">
    <!-- nav bar start -->
    <?php include 'components/admin-nav.php'; ?>
    <!-- nav bar end -->

    <div class="container">
        <div class="row">
            <div class="col-5 offset-1">
                <h2 class="text-center">Product Registration</h2>
                <div class="mb-3">
                    <label for="form-lable">Product Name:</label>
                    <input type="text" id="admin-stock-product" class="form-control">
                </div>
                
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="form-lable">Brand:</label>
                        <select id="admin-stock-brand" class="form-select">
                            <option value="0">Select brand</option>
                            <?php
                            $result = Database::search("SELECT * FROM brand");
                            for ($i = 0; $i < $result->num_rows; $i++) {
                                $data = $result->fetch_assoc();
                                echo "<option value='".$data['id']."'>".$data['name']."</option>";
                            }

                            ?>
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="form-lable">Category:</label>
                        <select id="admin-stock-category" class="form-select">
                            <option value="0">Select category</option>
                            <?php
                            $result = Database::search("SELECT * FROM category");
                            for ($i = 0; $i < $result->num_rows; $i++) {
                                $data = $result->fetch_assoc();
                                echo "<option value='".$data['id']."'>".$data['name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="form-lable">Color:</label>
                        <select id="admin-stock-color" class="form-select">
                            <option value="0">Select color</option>
                            <?php
                            $result = Database::search("SELECT * FROM color");
                            for ($i = 0; $i < $result->num_rows; $i++) {
                                $data = $result->fetch_assoc();
                                echo "<option value='".$data['id']."'>".$data['name']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="form-lable">Size:</label>
                        <select id="admin-stock-size" class="form-select">
                            <option value="0">Select size</option>
                            <?php
                            $result = Database::search("SELECT * FROM size");
                            for ($i = 0; $i < $result->num_rows; $i++) {
                                $data = $result->fetch_assoc();
                                echo "<option value='".$data['id']."'>".$data['name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="form-lable">Description:</label>
                    <textarea id="admin-stock-description" rows="4" cols="50" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="form-lable">Image:</label>
                    <input type="file" id="admin-stock-image" class="form-control" multiple>
                </div>

                <div class="d-none" id="admin-product-msg-div">
                    <div class="alert alert-danger" id="admin-product-msg"></div>
                </div>

                <div class="d-grid">
                    <button class="btn btn-outline-light mt-1" onclick="productReg();">Product register</button>
                </div>
            </div>

            <div class="col-5">
                <h2 class="text-center">Stock Management</h2>

                <div class="mb-3">
                    <label for="form-lable">Product:</label>
                    <select id="admin-stock-product-select" class="form-select">
                        <option value="0">Select product</option>
                        <option value="1">Adidas Black Small Shirt</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="form-lable">Quantity:</label>
                    <input type="number" id="admin-stock-quantity" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="form-lable">Unit price:</label>
                    <input type="text" id="admin-stock-unit-price" class="form-control">
                </div>

                <div class="d-grid">
                    <button class="btn btn-outline-light mt-1" onclick="updateStock();">Stock update</button>
                </div>
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