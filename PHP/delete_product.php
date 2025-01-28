<?php
include_once("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT image_path FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagePath);
    $stmt->fetch();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        if (file_exists($imagePath)) {
            unlink($imagePath); // Fshi imazhin
        }
        header("Location: ../htmlphp/Dashboard.php");
    } else {
        echo "Gabim gjatë fshirjes së produktit.";
    }

    $stmt->close();
}
?>