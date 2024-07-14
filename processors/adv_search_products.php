<?php
include "../connection.php";

$pageno = 0;
$page = $_POST["page"];
$color = $_POST["color"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$size = $_POST["size"];
$minPrice = $_POST["minPrice"];
$maxPrice = $_POST["maxPrice"];

$status = 0; // No condition

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

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
INNER JOIN `size` ON `product`.`size_id` = `size`.`id`";

// Search by color start
if ($status == 0 && $color != 0) {
    // 1st time search by color (WHERE)
    $query .= " WHERE `color`.`id`='" . $color . "'";
    $status = 1;
} elseif ($status != 0 && $color != 0) {
    // 2nd time search by color (AND)
    $query .= " AND `color`.`id`='" . $color . "'";
}
// Search by color end

// Search by category start
if ($status == 0 && $category != 0) {
    // 1st time search by category (WHERE)
    $query .= " WHERE `category`.`id`='" . $category . "'";
    $status = 1;
} elseif ($status != 0 && $category != 0) {
    // 2nd time search by category (AND)
    $query .= " AND `category`.`id`='" . $category . "'";
}
// Search by category end

// Search by brand start
if ($status == 0 && $brand != 0) {
    // 1st time search by brand (WHERE)
    $query .= " WHERE `brand`.`id`='" . $brand . "'";
    $status = 1;
} elseif ($status != 0 && $brand != 0) {
    // 2nd time search by brand (AND)
    $query .= " AND `brand`.`id`='" . $brand . "'";
}
// Search by brand end

// Search by size start
if ($status == 0 && $size != 0) {
    // 1st time search by size (WHERE)
    $query .= " WHERE `size`.`id`='" . $size . "'";
    $status = 1;
} elseif ($status != 0 && $size != 0) {
    // 2nd time search by size (AND)
    $query .= " AND `size`.`id`='" . $size . "'";
}
// Search by size end

// Search by min price start
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $query .= " WHERE `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $query .= " AND `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
    }
}
// Search by min price end

// Search by max price start
if (empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $query .= " WHERE `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $query .= " AND `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}
// Search by max price end

// Search by price range start
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $query .= " WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $query .= " AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}
// Search by price range end

$rs = Database::search($query);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$query2 = $query . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($query2);

$num2 = $rs2->num_rows;

if ($num2 == 0) {
    // Search No result
    ?>
    <div class="d-flex align-items-center flex-column mt-5">
        <h5>Search No Results</h5>
        <p>We're Sorry, We cannot find any matches for your search term...</p>
    </div>
    <?php
} else {
    // Load page
    for ($i = 0; $i < $num2; $i++) {
        $data = $rs2->fetch_assoc();
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
    <div class="mt-5 mb-4">
        <!-- pagination -->
        <nav aria-label="Page navigation example ">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php
                        if ($pageno <= 1) {
                            echo ("#");
                        } else {
                        ?>onclick="advSearchProducts(<?php echo ($pageno - 1) ?>);" <?php
                        }
                        ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                        ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advSearchProducts(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advSearchProducts(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php
                        if ($pageno >= $num_of_pages) {
                            echo ("#");
                        } else {
                        ?>onclick="advSearchProducts(<?php echo ($pageno + 1) ?>);" <?php
                        }
                        ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- pagination -->
    </div>
    <?php
}
?>