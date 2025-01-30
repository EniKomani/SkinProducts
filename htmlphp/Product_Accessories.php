<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Accessories</title>

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
   </div>

<div class="teksti_par">
    <h1>The ideal accessories for your routine</h1>
</div>

<div class="row1">
    <div class="column1">
        <img src="../img/aksesori 1.jpg" alt="1" style="width: 100%;">
        <p>Original Water Absorbent Skincare Wristbands - 100% Cotton</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£15</p><i class="bi bi-handbag"></i>
    </div>     
</div>
    <div class="column1">
        <img src="../img/aksesori 2.jpg" alt="2" style="width: 100%;">
        <p>Scalp Massager</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£30</p><i class="bi bi-handbag"></i>
        </div>
    </div>
    <div class="column1">
        <img src="../img/aksesori 3.jpg" alt="3" style="width: 100%;">
        <p>Bamboo Stimulating Scalp Massager</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£20</p><i class="bi bi-handbag"></i>
        </div>
    </div>
    <div class="column1">
        <img src="../img/aksesori 4.jpg" alt="4" style="width: 100%;">
        <p>Body Shower Brush with Long Handle</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£35</p><i class="bi bi-handbag"></i>
        </div>
    </div>
</div>

<div class="row1">
    <div class="column1">
        <img src="../img/aksesori 5.jpg" alt="5" style="width: 100%">
        <p>Exfoliating Loofah</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£35</p><i class="bi bi-handbag"></i>
        </div>
     </div>
     <div class="column1">
        <img src="../img/aksesori 6.jpg" alt="6" style="width: 100%">
        <p>MRD Hair brush, Natural Bamboo Paddle Detangling</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£17</p><i class="bi bi-handbag"></i>
        </div>
     </div>
     <div class="column1">
        <img src="../img/aksesori 7.jpg" alt="7" style="width: 100%">
        <p>Bamboo brush for hair</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£23</p><i class="bi bi-handbag"></i>
        </div>
     </div>
     <div class="column1">
        <img src="../img/aksesori 9.jpg" alt="9" style="width: 100%">
        <p>Exfoliating Loofah</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£45</p><i class="bi bi-handbag"></i>
        </div>
     </div>
    
</div>

<div class="row1">
    <div class="column1">
        <img src="../img/aksesori 14.jpg" alt="14" style="width: 100%">
        <p>Gua Sha Facial Lifting Tool</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£35</p><i class="bi bi-handbag"></i>
        </div>
     </div>
     <div class="column1">
        <img src="../img/aksesori 11.jpg" alt="11" style="width: 100%">
        <p>Natural Loofah Body Scrubber | 100% Natural</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£32</p><i class="bi bi-handbag"></i>
        </div>
     </div>
     <div class="column1">
        <img src="../img/aksesori 12.jpg" alt="12" style="width: 100%">
        <p>Body Silicon Scrub</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£20</p><i class="bi bi-handbag"></i>
        </div>
     </div>
     <div class="column1">
        <img src="../img/aksesori 13.jpg" alt="13" style="width: 100%">
        <p>Back Washer for Wet or Dry Brushing</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£27</p><i class="bi bi-handbag"></i>
        </div>
     </div>
    
</div>






   
  

</body>
</html>