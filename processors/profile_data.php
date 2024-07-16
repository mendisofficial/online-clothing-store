<?php

include "../connection.php";

session_start();
$user = $_SESSION["user"];

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$addressNumber = $_POST["addressNumber"];
$addressStreet = $_POST["addressStreet"];
$addressCity = $_POST["addressCity"];

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
} elseif (empty($password)) {
    echo "Password is required";
} elseif (strlen($password) < 8 || strlen($password) > 45) {
    echo "Password should be between 8 and 45 characters";
} elseif (empty($addressNumber)) {
    echo "Address number is required";
} elseif (strlen($addressNumber) > 10) {
    echo "Address number is too long";
} elseif (empty($addressStreet)) {
    echo "Address street is required";
} elseif (strlen($addressStreet) > 100) {
    echo "Address street is too long";
} elseif (empty($addressCity)) {
    echo "Address city is required";
} elseif (strlen($addressCity) > 100) {
    echo "Address city is too long";
} else {
    $result = Database::iud("UPDATE `user` SET `fname` = '$firstname', `lname` = '$lastname', `email` = '$email', `mobile` = '$mobile', `password` = '$password', `address_number` = '$addressNumber', `address_street` = '$addressStreet', `address_city` = '$addressCity' WHERE `user_id` = " . $user["user_id"]);

    $rs = Database::search("SELECT * FROM `user` WHERE `user_id` = '". $user["user_id"]. "'");
    $data = $rs->fetch_assoc();
    $_SESSION["user"] = $data;
    
    echo "Success";
}
