<?php

include '../connection.php';

$colorName = $_POST['colorName'];

if (empty($colorName)) {
    echo "Please enter a color name";
} elseif (strlen($colorName) > 20) {
    echo "Color name should be less than 20 characters";
} else {
    $result = Database::search("SELECT * FROM `color` WHERE `name` = '$colorName'");
    if ($result->num_rows > 0) {
        echo "This color is already registered";
    } else {
        Database::iud("INSERT INTO `color` (`name`) VALUES ('$colorName')");
        echo "Success";
    }
}
?>