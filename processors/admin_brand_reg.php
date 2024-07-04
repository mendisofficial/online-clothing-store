<?php

include '../connection.php';

$brandName = $_POST['brandName'];

if (empty($brandName)) {
    echo "Please enter a brand name";
} elseif (strlen($brandName) > 20) {
    echo "Brand name should be less than 20 characters";
} else {
    $result = Database::search("SELECT * FROM `brand` WHERE `name` = '$brandName'");
    if ($result->num_rows > 0) {
        echo "This brand is already registered";
    } else {
        Database::iud("INSERT INTO `brand` (`name`) VALUES ('$brandName')");
        echo "Success";
    }
}

?>