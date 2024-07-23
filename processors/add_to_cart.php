<?php

include '../connection.php';
session_start();

$stockId = $_POST['stockId'];
$quantity = $_POST['quantity'];

$user = $_SESSION['user'];

$result = Database::search("SELECT * FROM `stock` WHERE `id` = $stockId");

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $stockQty = $data['quantity'];

    $result2 = Database::search("SELECT * FROM `cart` WHERE `stock_id` = $stockId AND `user_id` = " . $user['user_id']);

    if ($result2->num_rows > 0) {
        $data2 = $result2->fetch_assoc();
        $cartQty = $data2['cart_quantity'];

        if ($stockQty >= $quantity + $cartQty) {
            $newQty = $quantity + $cartQty;
            $query = "UPDATE `cart` SET `cart_quantity` = $newQty WHERE `stock_id` = $stockId AND `user_id` = " . $user['user_id'];
            Database::iud($query);
            echo "Added to cart";
        } else {
            echo "Not enough stock";
        }
    } else {
        if ($stockQty >= $quantity) {
            $query = "INSERT INTO `cart` (`stock_id`, `user_id`, `cart_quantity`) VALUES ($stockId, " . $user['user_id'] . ", $quantity)";
            Database::iud($query);
            echo "Added to cart";
        } else {
            echo "Not enough stock";
        }
    }
} else {
    echo "Stock not found";
}

?>