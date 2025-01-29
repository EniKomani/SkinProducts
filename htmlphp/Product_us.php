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
            <a href="Dashboard.php">Dashboard</a>
        </div>
        <img src="../img/logo.png" alt="logo" class="logo">
        <button class="login_btn"><a href="loginform.html">Log In</a></button>
    </nav>
</div>

    <div class="rowflex">
            <div class="columnflex">
            <img src="../img/produkti 1.jpg" alt="1" style="width: 100%;">
            <p>The Impossible Glow Bronze Hyaluronic Acid & Sea Kelp Glow Drop</p>
            <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
            <p>£30</p>
            </div>
            </div>
   
        <div class="columnflex">
            <img src="../img/produkti 2.jpg" alt="2" style="width: 100%;">
            <p>Rosehip Bioregenerate Rejuvenating Overnight Face Oil</p>
            <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
            <p>£26</p>
            </div>
            </div>
        
        <div class="columnflex">
            <img src="../img/produkti 3 (2).jpg" alt="3" style="width: 100%;">
            <p>Rosehip Bioregenerate Rejuvenating Overnight Face Oil</p>
            <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
            <p>£20</p>
            </div>
            </div>

        <div class="columnflex">
            <img src="../img/produkti 4.jpg" alt="4" style="width: 100%;">
            <p>Brighten Starter Kit Cleanser, Face Oil & Booster Bundle</p>
            <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
            <p>£29</p>
            </div>
         </div>
    </div>
   
    <div class="rowflex">
       <div class="columnflex">
            <img src="../img/produkti 5.jpg" alt="5" style="width: 100%;">
            <p>The Light Fantastic Ceramide Face Oil</p>
            <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
            <p>£44</p>
            </div>
       </div>
                

       <div class="columnflex">
            <img src="../img/produkti 6 (3).jpg"  alt="6" style="width: 100%;">
            <p>Back to Life Hydrating Face Serum for Sensitive & Eczema Prone Skin</p>
            <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
            <p>£44</p>
            </div>
       </div>

       <div class="columnflex">
            <img src="../img/produkti 7.jpg" alt="7" style="width: 100%">
            <p>Viper's Gloss Squalene Overnight Face Oil with Echium & Amaranth1</p>
            <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
            <p>£44</p>
            </div>
        </div>

       <div class="columnflex">
            <img src="../img/produkti 8.jpg" alt="8" style="width: 100%">
            <p>Face Time Moisturiser and Serum Mix and Match Bundle</p>
            <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
            <p>£107</p>
            </div>
        </div>
               
   </div>

   <div class="rowflex">
    <div class="columnflex">
        <img src="../img/produkti 10.jpg" alt="10" style="width: 100%">
        <p>Me-Time Bundle Exfoliator, body cream, hand cream & mask bundle</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£65</p>
        </div>
            
    </div>

    <div class="columnflex">
        <img src="../img/produkti 11.jpg" alt="11" style="width: 100%">
        <p>Virtuous Circle Ultra Gentle Exfoliator for Sensitive Skin</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£29</p>
        </div>
          
    </div>

    <div class="columnflex">
        <img src="../img/produkti 12.jpg" alt="12" style="width: 100%">
        <p>Try Pai Kit Cleansing Oil 28ml, Moisturiser 10ml, Bronzing Drops 10ml, Face Oil 10ml with Travel Cast</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£49</p>
        </div>
           
    </div>

    <div class="columnflex">
        <img src="../img/produkti 13.jpg" alt="13" style="width: 100%">
        <p>Light Work Rosehip Cleansing Oil for Sensitive Skin</p>
        <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
        <p>£33</p>
        </div>
        
    </div>

   </div>

    
</body>
</html>