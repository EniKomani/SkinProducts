<?php
    include_once('config.php');

if (isset($_POST['submit'])) {
    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user(Full_name, Email, Username, password) values(:full_name, :email, :username, :password)";

    $pergatite = $connect->prepare($sql);
    
    $pergatite->bindParam(':full_name', $full_name);
    $pergatite->bindParam(':email', $email);
    $pergatite->bindParam(':username', $username);
    $pergatite->bindParam(':password', $password);

    $pergatite->execute();

    header("Location: ../htmlphp/loginform.html");
    exit();

}