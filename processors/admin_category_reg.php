<?php

include '../connection.php';

$categoryName = $_POST['categoryName'];

if (empty($categoryName)) {
    echo "Please enter a category name";
} elseif (strlen($categoryName) > 20) {
    echo "Category name should be less than 20 characters";
} else {
    $result = Database::search("SELECT * FROM `category` WHERE `name` = '$categoryName'");
    if ($result->num_rows > 0) {
        echo "This category is already registered";
    } else {
        Database::iud("INSERT INTO `category` (`name`) VALUES ('$categoryName')");
        echo "Success";
    }
}

?>