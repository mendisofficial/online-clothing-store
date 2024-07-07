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
     </div>
    <!-- basic search end -->

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