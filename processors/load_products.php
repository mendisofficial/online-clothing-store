<?php

include '../connection.php';

$pageNumber = $_POST['page'];
$pageNumber = max($pageNumber, 1); // Ensure pageNumber is at least 1

// The query with all necessary joins and aliases in a single line
$query = "SELECT `stock`.`id` AS stock_id, `product`.`id` AS product_id, `product`.`name` AS product_name, `brand`.`name` AS brand_name, `category`.`name` AS category_name, `color`.`name` AS color_name, `size`.`name` AS size_name, `product`.`description`, `product`.`image_path` AS image, `stock`.`price`, `stock`.`quantity`, `stock`.`status` FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id` INNER JOIN `color` ON `product`.`color_id` = `color`.`id` INNER JOIN `category` ON `product`.`category_id` = `category`.`id` INNER JOIN `size` ON `product`.`size_id` = `size`.`id` ORDER BY `stock`.`id` ASC";

$result = Database::search($query);

$resultsPerPage = 8;
$numberOfPages = ceil($result->num_rows / $resultsPerPage);

$pageFirstResult = ($pageNumber - 1) * $resultsPerPage;

$query2 = $query . " LIMIT $resultsPerPage OFFSET $pageFirstResult";

$result2 = Database::search($query2);

if ($result2->num_rows > 0) {
    for ($i = 0; $i < $result2->num_rows; $i++) {
        $data = $result2->fetch_assoc();
?>
        <!-- product card strart -->
        <div class="col-3 mt-5 d-flex justify-content-center">
            <div class="card" style="width: 300px;">
                <img src="<?php echo $data['image'] ?>" class="card-img-top">
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
                                                            ?> onclick="loadProducts(<?php echo ($pageNumber - 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Previous</a></li>
                <?php
                for ($i = 1; $i <= $numberOfPages; $i++) {
                    if ($i == $pageNumber) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="loadProducts(<?php echo $i ?>);"><?php echo $i ?></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="loadProducts(<?php echo $i ?>);"><?php echo $i ?></a></li>
                <?php
                    }
                }
                ?>
                <li class="page-item"><a class="page-link" <?php
                                                            if ($pageNumber >= $numberOfPages) {
                                                                echo "#";
                                                            } else {
                                                            ?> onclick="loadProducts(<?php echo ($pageNumber + 1) ?>);" <?php
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
        <h5>No products available</h5>
    </div>
    <?php
}

?>