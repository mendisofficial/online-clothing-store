<?php
session_start();

include '../connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$remember = $_POST['remember'];

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
        // check if user account is disabled
        if ($row['status'] == 1) {
            // keep user data in session
            $_SESSION['user'] = $row;

            // keep user logged in if remember me is checked
            if ($remember == "true") {
                setcookie("username", $username, time() + 60 * 60 * 24 * 30, "/", "", true, true);
                setcookie("password", $password, time() + 60 * 60 * 24 * 30, "/", "", true, true);
            } else {
                setcookie("username", "", -1);
                setcookie("password", "", -1);
            }

            echo "Success";
        } else {
            echo "Your account is disabled";
        }        
    } else {
        echo "Invalid username or password";
    }
}



?>
