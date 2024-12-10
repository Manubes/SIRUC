<?php
// Datos de conexión
$host = 'localhost';
$dbname = 'actisis1_BDSIRUC';
$username = 'actisis1_UV';
$password = '*Sistema2024';

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los congresos
$sql = "SELECT IDCongreso, Nombre, FechaInicio, FechaFin FROM CONGRESOS";
$result = $conn->query($sql);

// Verificar si hay resultados
$congresos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $congresos[] = $row;
    }
}

// Devolver los resultados como JSON
echo json_encode($congresos);

// Cerrar la conexión
$conn->close();
?>