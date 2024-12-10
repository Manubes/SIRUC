<?php
$servername = "localhost";
$username = "actisis1_UV";
$password = "*Sistema2024";
$dbname = "actisis1_BDSIRUC";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>