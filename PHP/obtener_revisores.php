<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "actisis1_UV", "*Sistema2024", "actisis1_BDSIRUC");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los revisores
$sql = "SELECT IDUsuario, Nombre FROM USUARIOS";
$result = $conn->query($sql);

$revisores = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $revisores[] = $row;
    }
}

$conn->close();

// Convertir los revisores a formato JSON
echo json_encode($revisores);
?>