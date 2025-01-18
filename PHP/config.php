<?php

$server = 'localhost';
$dbname = 'users';
$username = 'root';
$password = '';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

try {
    $connect = new PDO("mysql:host=$server; dbname=$dbname", $username, $password);
} catch (Exception $e) {
    echo "Something went wrong";
}
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Përgatitja e query-t për të shtuar përdoruesin në databazë
$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>