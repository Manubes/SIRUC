<?php
include 'db_connection.php';

// Consulta para obtener los artículos
$sql = "SELECT IDArticulo, Titulo, Resumen, Estatus, Archivo FROM ARTICULOS";
$result = $conn->query($sql);

// Array para almacenar los artículos
$articulos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $articulos[] = $row;
    }
}

// Consultar revisores disponibles
$sql_revisores = "SELECT IDUsuario, Nombre FROM USUARIOS";
$result_revisores = $conn->query($sql_revisores);

// Array para almacenar los revisores
$revisores = [];

if ($result_revisores->num_rows > 0) {
    while ($row = $result_revisores->fetch_assoc()) {
        $revisores[] = $row;
    }
}

// Cerrar la conexión
$conn->close();

// Enviar los artículos y revisores como JSON
echo json_encode(['articulos' => $articulos, 'revisores' => $revisores]);
?>
