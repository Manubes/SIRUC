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

// Obtener los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];

// Consulta SQL para guardar el congreso
$sql = "INSERT INTO CONGRESOS (Nombre, FechaInicio, FechaFin) VALUES ('$nombre', '$fecha_inicio', '$fecha_final')";

if ($conn->query($sql) === TRUE) {
    echo "Congreso guardado exitosamente";
} else {
    echo "Error al guardar el congreso: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
