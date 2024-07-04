<?php

include '../connection.php';

$sizeName = $_POST['sizeName'];

if (empty($sizeName)) {
    echo "Please enter a size name";
} elseif (strlen($sizeName) > 20) {
    echo "Size name should be less than 20 characters";
} else {
    $result = Database::search("SELECT * FROM `size` WHERE `name` = '$sizeName'");
    if ($result->num_rows > 0) {
        echo "This size is already registered";
    } else {
        Database::iud("INSERT INTO `size` (`name`) VALUES ('$sizeName')");
        echo "Success";
    }
}
?>