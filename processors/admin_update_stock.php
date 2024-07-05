<?php

include '../connection.php';

$productId = $_POST['productId'];
$productQuantity = $_POST['productQuantity'];
$productUnitPrice = $_POST['productUnitPrice'];

if (empty($productId)) {
    echo "Product is required";
} elseif (empty($productQuantity)) {
    echo "Quantity is required";
} elseif (!is_numeric($productQuantity)) {
    echo "Quantity must be a number";
} elseif ($productQuantity < 0) {
    echo "Quantity must be a positive number";
} elseif (strlen($productQuantity) > 11) {
    echo "Quantity is too long";
} elseif (empty($productUnitPrice)) {
    echo "Unit price is required";
} elseif (!is_numeric($productUnitPrice)) {
    echo "Unit price must be a number";
} elseif ($productUnitPrice < 0) {
    echo "Unit price must be a positive number";
} else {
    $result = Database::search("SELECT * FROM `stock` WHERE `product_id` = $productId AND `price` = $productUnitPrice");

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $productQuantity += $data['quantity'];
        Database::iud("UPDATE `stock` SET `quantity` = $productQuantity WHERE `id` = $data[id]");
        echo "Success";
    } else {
       Database::iud("INSERT INTO `stock`(`product_id`, `quantity`, `price`) VALUES ($productId, $productQuantity, $productUnitPrice)");
        echo "Success";
    }
}

?>