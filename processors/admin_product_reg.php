<?php

include '../connection.php';

$productName = $_POST['productName'];
$productBrand = $_POST['productBrand'];
$productCategory = $_POST['productCategory'];
$productColor = $_POST['productColor'];
$productSize = $_POST['productSize'];
$productDescription = $_POST['productDescription'];

if (empty($productName)) {
    echo "Product name is required";
} elseif (strlen($productName) > 100) {
    echo "Product name is too long";
} elseif ($productBrand == "0") {
    echo "Brand is required";
} elseif ($productCategory == "0") {
    echo "Category is required";
} elseif ($productColor == "0") {
    echo "Color is required";
} elseif (empty($productSize)) {
    echo "Size is required";
} elseif (empty($productDescription)) {
    echo "Description is required";
} else {
    if (isset($_FILES['productImage'])) {
        $productImage = $_FILES['productImage'];
        $fileExtension = pathinfo($productImage['name'], PATHINFO_EXTENSION);
        $imagePath = "assets/img/products/" . uniqid() . "." . $fileExtension;
        move_uploaded_file($productImage['tmp_name'], "../".$imagePath);

        $result = Database::search("SELECT * FROM `product` WHERE `name` = '$productName'");
        if ($result->num_rows > 0) {
            echo "Product already exists";
        } else {
            Database::iud("INSERT INTO `product`(`name`, `brand_id`, `category_id`, `color_id`, `size_id`, `description`, `image_path`) VALUES ('$productName', $productBrand, $productCategory, $productColor, $productSize, '$productDescription', '$imagePath')");
            echo "Success";
        }
    } else {
        echo "Product image is required";
    }
}

?>