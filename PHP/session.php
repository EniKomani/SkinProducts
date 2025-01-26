<?php

session_start();

if(isset($email) && isset($password)){
    $_SESSION['email']=$email;
    $_SESSION['role']=$role;
    $_SESSION['username']=$username;


    header("Location: ../htmlphp/Home.php");
    exit();
}

?>