<?php
session_start();
include '../connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username)) {
    echo "Username is required";
} elseif (strlen($username) > 20) {
    echo "Username is too long";
} elseif (empty($password)) {
    echo "Password is required";
} elseif (strlen($password) < 8 || strlen($password) > 45) {
    echo "Password should be between 8 and 45 characters";
} else {
    $result = Database::search("SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'");

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if ($row['status'] == 1) {
            if ($row['user_type_id'] == 1) {
                $_SESSION['admin'] = $row;
                echo "Success";
            } else {
                echo "You are not an admin";
            }
        } else {
            echo "Your account is disabled";
        }
    } else {
        echo "Invalid username or password";
    }
}

?>