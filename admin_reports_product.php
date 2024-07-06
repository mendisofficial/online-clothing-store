<?php
session_start();

include 'connection.php';

if (isset($_SESSION['admin'])) {
    $result = Database::search("SELECT `product`.`id` AS product_id, `product`.`name` AS product_name, `brand`.`name` AS brand_name, `category`.`name` AS category_name, `color`.`name` AS color_name, `size`.`name` AS size_name, `product`.`description`, `product`.`image_path` AS image FROM `product` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id` INNER JOIN `color` ON `product`.`color_id` = `color`.`id` INNER JOIN `category` ON `product`.`category_id` = `category`.`id` INNER JOIN `size` ON `product`.`size_id` = `size`.`id` ORDER BY `product`.`id` ASC");


    ?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - Admin Dashboard - Reports - Product report</title>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-3">
            <a href="admin_reports.php"><img src="assets/img/back.png" alt="back-icon" height="25"></a>
        </div>

        <div class="container mt-3" id="print-area">
            <h2 class="text-center">Product Report</h2>
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Brand Name</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i = 0; $i < $result->num_rows; $i++) {
                            $data = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>".$data['product_id']."</td>";
                            echo "<td>".$data['product_name']."</td>";
                            echo "<td>".$data['brand_name']."</td>";
                            echo "<td>".$data['category_name']."</td>";
                            echo "<td>".$data['color_name']."</td>";
                            echo "<td>".$data['size_name']."</td>";
                            echo "<td>".$data['description']."</td>";
                            echo "<td><img src='".$data['image']."' alt='product-image' height='75'></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end container mt-5 mb-5">
            <button class="btn btn-outline-info col-2" onclick="printScreen();">Print</button>
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
