<?php

session_start();

if(isset($_POST['submit'])){
    $firstname =$_POST['fistname'];
    $lastname= $_POST['lastname'];
    $email= $_POST['email'];
    $subject=$_POST['subject'];
    
    if(empty($firstname) || empty($lastname) || empty($email) || empty($subject)){
        
    }
    else{
        $to ="komanieni@gmail.com";
        
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
         body{
            background-image: url("foto1..jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
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
    <div class="container1">
        <form action="../PHP/contact.php"method="post">
        <label for="firstname">Full Name</label>
        <input type="text" id="firstname" name="name" placeholder="Your name..." required>

        <label for="email">Email</label>
        <input type="Email" id="email" name="email"placeholder="write something..." required>
           

        
        <label for="message">Message</label>
        <textarea id="subject" name="message" placeholder="Write something..."></textarea>

        <input type="submit" name="submit" value="Submit">
        </form>
    </div>


    
</body>
</html>