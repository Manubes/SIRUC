<?php
header("Content-Type: text/html; charset=utf-8");

// Conexi�� a la base de datos
$servername = "localhost";
$username = "actisis1_UV";
$password = "*Sistema2024";
$database = "actisis1_BDSIRUC";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexi��n
if ($conn->connect_error) {
    die("Conexi��n fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar datos del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO USUARIOS(IDPerfil, Nombre, Correo, Contrasena) VALUES (1, '$nombre', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Registro exitoso. �0�3Gracias por registrarte!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>