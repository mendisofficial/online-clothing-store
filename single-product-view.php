<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Store - Single Product View</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- nav bar start -->
    <?php include 'components/nav.php'; ?>
    <!-- nav bar end -->

    <div class="admin-body">
        <div class="col-8 row shadow p-5 bg-body-tertiary rounded-2 m-auto">
            <div class="col-6">
                <img src="assets/img/products/66921956ebb04.png" width="300px" class="rounded-3 shadow-lg" />
            </div>
            <div class="col-6">
                <h4 class="mt-3">Name</h4>
                <h5 class="mt-3">Brand</h5>
                <h6 class="mt-3">Category</h6>
                <h6 class="mt-3">Color</h6>
                <h6 class="mt-3">Size</h6>
                <p class="mt-auto">Description</p>
                <div class="row">
                    <div class="col-3">
                        <input type="number" placeholder="Qty" class="form-control" />
                    </div>
                    <div class="col-6 mt-2">
                        <h6 class="text-warning">Available Quanity : 123</h6>
                    </div>
                </div>
                <h5 class="mt-3">Price : 123 LKR</h5>
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-outline-primary col-6">Add to cart</a>
                    <a href="#" class="btn btn-primary col-6 ms-2">Buy now</a>

                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
    <div class="fixed-bottom col-12 mt-3">
        <p class="text-center">&copy; 2024 online clothing store | All rights reserved</p>
    </div>
    <!-- footer end -->

    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
