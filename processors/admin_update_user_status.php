<?php
include '../connection.php';

$userId = $_POST['userId'];

if (empty($userId)) {
    echo "User ID is required";
} else {
    $result = Database::search("SELECT * FROM `user` WHERE `user_id` = '$userId' AND `user_type_id` = '2'");

    if ($result->num_rows == 0) {
        echo "User not found";
    } else {
        $data = $result->fetch_assoc();

        if ($data["status"] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        Database::iud("UPDATE `user` SET `status` = '$status' WHERE `user_id` = '$userId'");
        echo "Success";
    }
}


?>
