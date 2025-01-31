<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page with Navbar</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    
</head>
    <body>
        <div id="nje">
            
            <nav>
                <div class="left_links">
                    <a href="">Home</a>
                    <a href="About_us.php">About Us</a>
                    <a href="Contact_us.php">Contact Us</a>
                    <a href="Product_us.php">Product</a>
                    <a href="Product_Accessories.php">Product Accessories</a>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "Admin") { echo '<a href="Dashboard.php">Dashboard</a>';} ?>


                </div>
                <img src="../img/logo.png" alt="logo" class="logo">
                <p ><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?></p>
                <?php if (isset($_SESSION['email'])): ?>
                    <button class="login_btn"><a href="../PHP/logOut.php">Log out</a></button>
                <?php else: ?>
                <button class="login_btn"><a href="loginform.html">Log In</a></button>
                <?php endif; ?>
            </nav>
                      
        
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="../img/./home.jpeg" style="width:100%">
                        </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="../img/./slideshow1.avif" style="width:100%">
                       
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="../img/./slideshow2.webp" style="width:100%">
                      
                    </div>

                    
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>
            </div>

        
       

        <h1 class="text">Bestsellers</h1>

        
        <div class="row">
            <div class="column">
            <img src="../img/home3.avif" alt="1" style="width: 100%;">
            <p>The Impossible Glow Bronze Hyaluronic Acid & Sea Kelp Glow Drops</p>
            <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
            <p>£29</p>
            </div>
        </div>
            
           
            <div class="column">
                <img src="../img/home2.webp" alt="2" style="width: 100%;">
                <p>Virtuous Circle Ultra Gentle Exfoliator for Sensitive Skin</p>
                <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
                <p>£29</p>
                </div>
        </div>
            
            <div class="column">
                <img src="../img/home1.jpg" alt="3" style="width: 100%;">
                <p>Rosehip Radiance Bundl Limited Edition Rosehip Cleanser & Face Oil Bundle</p>
                <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
                <p>£50</p>
                </div>
            </div>

            <div class="column">
                <img src="../img/home4.webp" alt="4" style="width: 100%;">
                <p>British Summer Time SPF 30SPF 30 Mineral Sunscreen for Sensitive Skin</p>
                <div style="font-size: 20px; display: flex; justify-content: space-between; width: 100%;">
                    <p>£39</p>
                </div>
            </div>
        </div>
        
        <div class="row1">
            <div class="column1">
            <img src="../img/home5.avif" alt="5" style="width: 100%;">
            </div>

            <div class="column1">
            <img src="../img/quote.jpg"  alt="6" style="width: 100%;">
            </div>
        </div>
        
        <script>
            var myIndex = 0;
            carousel();
            
            function carousel() {
              var i;
              var x = document.getElementsByClassName("mySlides");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              myIndex++;
              if (myIndex > x.length) {myIndex = 1}    
              x[myIndex-1].style.display = "block";  
              setTimeout(carousel, 2000); // Change image every 2 seconds
            }
            </script>
    </body>
</html>
