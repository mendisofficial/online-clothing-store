<?php

include '../connection.php';

$cartId = $_POST['cartId'];
$newQty = $_POST['newQuantity'];

$result = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_id` = `stock`.`id` WHERE `cart`.`cart_id` = '$cartId';");

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($newQty > $data['quantity']) {
        echo "Quantity exceeds stock quantity!";
    } else {
        Database::iud("UPDATE `cart` SET `cart_quantity` = '$newQty' WHERE `cart_id` = '$cartId';");
        echo "Success";
    }
} else {
    echo "Cart item not found!";
}


?>