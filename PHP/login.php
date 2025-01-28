<?php
session_start();

include_once('../PHP/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT username,password, role FROM user WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($username ,$hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            if ($role === 'Admin') {
                header("Location: ../htmlphp/Dashboard.php");
            } else {
                header("Location: ../htmlphp/Home.php");
            }
            exit();
        } else {
            echo "Email ose Password jane gabim";
            exit();
        }
    } else {
        echo "nuk ka perdorues";
        exit();
    }

    $stmt->close();
    $conn->close();
}

?>