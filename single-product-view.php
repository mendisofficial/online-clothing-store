<?php
include 'connection.php';

$stockID = $_GET['stock'];

if (!isset($stockID)) {
    echo "<script>location.href='home.php'</script>";
} else {
    $query = "SELECT 
    `stock`.`id` AS `stock_id`,
    `stock`.`product_id`,
    `stock`.`price`,
    `stock`.`quantity`,
    `stock`.`status` AS `stock_status`,
    `product`.`id` AS `product_id`,
    `product`.`name` AS `product_name`,
    `product`.`description`,
    `product`.`image_path` AS `image`,
    `product`.`brand_id`,
    `product`.`category_id`,
    `product`.`size_id`,
    `product`.`color_id`,
    `brand`.`id` AS `brand_id`,
    `brand`.`name` AS `brand_name`,
    `color`.`id` AS `color_id`,
    `color`.`name` AS `color_name`,
    `category`.`id` AS `category_id`,
    `category`.`name` AS `category_name`,
    `size`.`id` AS `size_id`,
    `size`.`name` AS `size_name`
FROM `stock`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`id`
INNER JOIN `category` ON `product`.`category_id` = `category`.`id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`id`
WHERE `stock`.`id` = $stockID";

    $result = Database::search($query);
    $data = $result->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Clothing Store - Single Product View - <?php echo $data['product_name'] ?></title>
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
                    <img src="<?php echo $data['image'] ?>" width="300px" class="rounded-3 shadow-lg" />
                </div>
                <div class="col-6">
                    <h4 class="mt-3 text-info"><?php echo $data['product_name'] ?></h4>
                    <h5 class="mt-3">Brand : <?php echo $data['brand_name'] ?></h5>
                    <h6 class="mt-3">Category : <?php echo $data['category_name'] ?></h6>
                    <h6 class="mt-3">Color : <?php echo $data['color_name'] ?></h6>
                    <h6 class="mt-3">Size : <?php echo $data['size_name'] ?></h6>
                    <p class="mt-auto"><?php echo $data['description'] ?></p>
                    <div class="row">
                        <div class="col-3">
                            <input type="number" placeholder="Qty" class="form-control" id="qty" />
                        </div>
                        <div class="col-6 mt-2">
                            <h6 class="text-warning">Available Quanity : <?php echo $data['quantity'] ?></h6>
                        </div>
                    </div>
                    <h5 class="mt-3">Price : <?php echo $data['price'] ?> LKR</h5>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-outline-primary col-6" onclick="addToCart(<?php echo $data['stock_id'] ?>);">Add to cart</a>
                        <a href="#" class="btn btn-primary col-6 ms-2">Buy now</a>
                    </div>
                    <div class="mt-3 d-none" id="spv-msg-div">
                        <div class="alert alert-danger" id="spv-msg"></div>
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
<?php
}
?>