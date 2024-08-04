<?php
include '../connection.php';

$cartId = $_POST['cartId'];

Database::iud("DELETE FROM `cart` WHERE `cart_id` = '$cartId';");

echo "Success";

?>