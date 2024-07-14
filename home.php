<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Store - Home</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body onload="loadProducts(0);">
    <!-- nav bar start -->
    <?php include 'components/nav.php'; ?>
    <!-- nav bar end -->
    
    <!-- basic search start -->
     <div class="container d-flex justify-content-end mt-5">
        <div class="col-3 mt-3">
            <input type="text" id="product-search" class="form-control" placeholder="Enter product name" onkeyup="searchProducts(0);">
        </div>
        <button class="btn btn-outline-info col-1 ms-2 mt-3" onclick="viewAdvancedSearch();">Filters</button>
     </div>
    <!-- basic search end -->

    <!-- advanced search start -->
    <div class="d-none" id="advanced-search">
        <div class="border border-light rounded-4 mt-4 p-5 col-10 offset-1">
            <div class="row col-12">
                <div class="row col-6 ms-auto">
                    <label class="form-label col-3">Color</label>
                    <select id="color" class="form-select bg-dark col-9 ">
                        <option value="0">Select color</option>
                        <?php
                                    $resultsetColor = Database::search("SELECT * FROM `color`");

                                    for ($i = 0; $i < $resultsetColor->num_rows; $i++) {
                                        $color = $resultsetColor->fetch_assoc();
                                        echo "<option value='" . $color["id"] . "'>" . $color["name"] . "</option>";
                                    }
                        ?>
                    </select>
                </div>

                <div class="row col-6 ms-3 ms-auto">
                    <label class="form-label col-3">Category</label>
                    <select id="category" class="form-select bg-dark col-9 ">
                        <option value="0">Select category</option>
                        <?php
                                    $resultsetCategory = Database::search("SELECT * FROM `category`");

                                    for ($i = 0; $i < $resultsetCategory->num_rows; $i++) {
                                        $category = $resultsetCategory->fetch_assoc();
                                        echo "<option value='" . $category["id"] . "'>" . $category["name"] . "</option>";
                                    }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row col-12 mt-3">
                <div class="row col-6 ms-auto">
                    <label class="form-label col-3">Brand</label>
                    <select id="brand" class="form-select bg-dark col-9 ">
                        <option value="0">Select brand</option>
                        <?php
                                    $resultsetSize = Database::search("SELECT * FROM `brand`");

                                    for ($i = 0; $i < $resultsetSize->num_rows; $i++) {
                                        $brand = $resultsetSize->fetch_assoc();
                                        echo "<option value='" . $brand["id"] . "'>" . $brand["name"] . "</option>";
                                    }
                        ?>
                    </select>
                </div>

                <div class="row col-6 ms-3 ms-auto">
                    <label class="form-label col-3">Size</label>
                    <select id="size" class="form-select bg-dark col-9 ">
                        <option value="0">Select size</option>
                        <?php
                                    $resultsetBrand = Database::search("SELECT * FROM `size`");

                                    for ($i = 0; $i < $resultsetBrand->num_rows; $i++) {
                                        $size = $resultsetBrand->fetch_assoc();
                                        echo "<option value='" . $size["id"] . "'>" . $size["name"] . "</option>";
                                    }
                        ?>
                    </select>
                </div>
            </div>

            <div class="mt-4 row col-12 m-auto">
                <div class="col-5">
                    <input type="text" id="min-price" class="form-control" placeholder="Minimum price">
                </div>
                <div class="col-5">
                    <input type="text" id="max-price" class="form-control" placeholder="Maximum price">
                </div>
                <button class="btn btn-outline-info col-2" onclick="advSearchProducts(0);">Search</button>
            </div>
        </div>
    </div>
    <!-- advanced search end -->

    <!-- load products start -->
    <div class="row col-10 offset-1" id="products-load">
        
    </div>
    <!-- load products end -->


    <!-- footer start -->
    <div class="col-12 mt-3">
        <p class="text-center">&copy; 2024 online clothing store | All rights reserved</p>
    </div>
    <!-- footer end -->
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>