<?php
session_start();

include_once('../PHP/config.php');

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$result = $stmt->get_result();

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    
      
</head>
<body>
    <nav>
        <div class="left_links">
            <a href="home.php">Home</a>
            <a href="About_us.php">About Us</a>
            <a href="Contact_us.php">Contact Us</a>
            <a href="Product_us.php">Product</a>
            <a href="Product_Accessories.php">Product Accessories</a>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "Admin") { echo '<a href="Dashboard.php">Dashboard</a>';} ?>
        </div>
        <img src="../img/logo.png" alt="logo" class="logo">
        <button class="login_btn"><a href="loginform.html">Log In</a></button>
    </nav>

    <div style="margin-top: 50px">
        <div class="rowflex">
            <?php
            $count = 0;
            if ($result->num_rows > 0) {
                while ($product = $result->fetch_assoc()) {
                    // Hap një div të ri nëse është produkti i parë ose pas çdo grupi prej 4 produktesh
                    if ($count % 4 == 0 && $count != 0) {
                        echo '</div><div class="rowflex">';
                    }

                    echo '<div class="columnflex">';
                    echo '<img src="' . $product['image_path'] . '" alt="Product Image">';
                    echo '<p>' . $product['name'] . '</p>';
                    echo '<div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">';
                    echo '<p>' . $product['type'] . '</p>';
                    echo '</div>';
                    echo '</div>';

                    $count++;
                }
            } else {
                echo '<p>No products available.</p>';
            }
            ?>
        </div> 
    </div>
</body>
</html>