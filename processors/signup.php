<?php
include '../connection.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$username = $_POST['username'];
$password = $_POST['password'];

if (empty($firstname)) {
    echo "First name is required";
} elseif (strlen($firstname) > 20) {
    echo "First name is too long";
} elseif (empty($lastname)) {
    echo "Last name is required";
} elseif (strlen($lastname) > 20) {
    echo "Last name is too long";
} elseif (empty($email)) {
    echo "Email is required";
} elseif (strlen($email) > 100) {
    echo "Email is too long";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
} elseif (empty($mobile)) {
    echo "Mobile is required";
} elseif (strlen($mobile) != 10) {
    echo "Mobile number should be 10 digits";
} elseif (!preg_match("/07[0, 1, 2, 4, 5, 6, 7, 8]{1}[0-9]{7}/", $mobile)) {
    echo "Invalid mobile number";
} elseif (empty($username)) {
    echo "Username is required";
} elseif (strlen($username) > 20) {
    echo "Username is too long";
} elseif (empty($password)) {
    echo "Password is required";
} elseif (strlen($password) < 8 || strlen($password) > 45) {
    echo "Password should be between 8 and 45 characters";
} else {
    $result = Database::search("SELECT * FROM `user` WHERE `email` = '$email' OR `mobile` = '$mobile' OR `username` = '$username'");

    if ($result->num_rows > 0) {
        echo "Email, mobile or username already exists";
    } else {
        $result = Database::iud("INSERT INTO `user` (`fname`, `lname`, `email`, `mobile`, `username`, `password`, `user_type_id`) VALUES ('$firstname', '$lastname', '$email', '$mobile', '$username', '$password', 2)");
        echo "Success";
    }
}
?>
