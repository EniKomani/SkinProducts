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

?>