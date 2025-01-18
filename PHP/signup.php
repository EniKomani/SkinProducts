<?php
// Kontrollo nëse formulari është dërguar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 
    // Merr të dhënat nga formulari
    $username = $_POST['username'];
    $password = $_POST['password'];

    // (Opsionale) Mund të bësh validime ose të ruash të dhënat në databazë
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Password: " . htmlspecialchars($password);
} else {
    echo "Nuk ka të dhëna të dërguara!";
}
