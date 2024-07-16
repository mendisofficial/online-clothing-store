<?php

include "../connection.php";

session_start();
$user = $_SESSION["user"];

if (empty($_FILES["image"])) {
    echo ("Please select an image");
} else {
    // Upload Img
    $result = Database::search("SELECT * FROM `user` WHERE `user_id` = '" . $user["user_id"] . "'");
    $ata = $result->fetch_assoc();

    if (!empty($data["image_path"])) {
        unlink($data["image_path"]); // Delete from the project
    }

    // Upload new image
    $image = $_FILES['image'];
    $fileExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $imagePath = "assets/img/profile-image/" . uniqid() . "." . $fileExtension;
    move_uploaded_file($image['tmp_name'], "../" . $imagePath);

    // Update user profile image path
    Database::iud("UPDATE `user` SET `image_path` = '" . $imagePath . "' WHERE `user_id` = '" . $user["user_id"] . "'");
    // echo $imagePath;
    echo "Success";
}
