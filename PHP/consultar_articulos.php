<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "actisis1_UV", "*Sistema2024", "actisis1_BDSIRUC");

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los artículos
$sql = "SELECT IDArticulo, Titulo, Resumen, Estatus, Archivo FROM ARTICULOS";
$result = $conn->query($sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error al ejecutar la consulta: " . $conn->error);
}

$articulos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $articulos[] = $row;
    }
} else {
    echo "No se encontraron artículos.";
}

$conn->close();

// Convertir los artículos a formato JSON
echo json_encode($articulos);
?>