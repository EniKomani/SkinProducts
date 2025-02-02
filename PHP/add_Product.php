<?php
include_once("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $admin_name = $_POST['admin_name'];



    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $imagePath = "../img/product/" . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $imagePath);

        $stmt = $conn->prepare("INSERT INTO products (name, type, image_path, admin_name) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $type, $imagePath, $admin_name);

        if ($stmt->execute()) {
            header("Location: ../htmlphp/Dashboard.php"); 
            exit();
        } else {
            echo "Gabim gjatë shtimit të produktit.";
        }

        $stmt->close();
    } else {
        echo "Gabim në ngarkimin e imazhit.";
    }
}
?>