<?php

include '../connection.php';

$pageNumber = 0;
$page = $_POST['page'];
$product = $_POST['product'];

if ($page != 0) {
    $pageNumber = $page;
} else {
    $pageNumber = 1;
}

$query = "SELECT `stock`.`id` AS stock_id, `stock`.`price`, `stock`.`quantity`, `stock`.`status`, `product`.`id` AS product_id, `product`.`name` AS product_name, `product`.`description`, `product`.`image_path` AS path, `brand`.`name` AS brand_name
FROM `stock`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id`
WHERE `product`.`name` LIKE '%$product%'";

$result = Database::search($query);

$resultsPerPage = 8;
$numberOfPages = ceil($result->num_rows / $resultsPerPage);

$pageResults = ($pageNumber - 1) * $resultsPerPage;

$query2 = $query . " LIMIT $resultsPerPage OFFSET $pageResults";

$result2 = Database::search($query2);

if ($result2->num_rows > 0) {
    for ($i = 0; $i < $result2->num_rows; $i++) {
        $data = $result2->fetch_assoc();
?>
        <!-- product card start -->
        <div class="col-3 mt-5 d-flex justify-content-center">
            <div class="card" style="width: 300px;">
                <img src="<?php echo $data['path'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['product_name'] ?></h5>
                    <p class="card-text"><?php echo $data['description'] ?></p>
                    <p class="card-text"><?php echo $data['price'] ?> LKR</p>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-outline-primary col-6">Add to cart</a>
                        <a href="#" class="btn btn-primary col-6 ms-2">Buy now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- product card end -->
    <?php
    }
    ?>

    <!-- pagination start -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageNumber <= 1) {
                                                                echo "#";
                                                            } else {
                                                            ?> onclick="searchProducts(<?php echo ($pageNumber - 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Previous</a></li>
                <?php
                for ($i = 1; $i <= $numberOfPages; $i++) {
                    if ($i == $pageNumber) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="searchProducts(<?php echo $i ?>);"><?php echo $i ?></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="searchProducts(<?php echo $i ?>);"><?php echo $i ?></a></li>
                <?php
                    }
                }
                ?>
                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageNumber >= $numberOfPages) {
                                                                echo "#";
                                                            } else {
                                                            ?> onclick="searchProducts(<?php echo ($pageNumber + 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Next</a></li>
            </ul>
        </nav>
    </div>
    <!-- pagination end -->

<?php
} else {
?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>No search results</h5>
    </div>
<?php
}

?>
