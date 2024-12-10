<?php
// Establecer conexión a la base de datos
$conn = new mysqli('localhost', 'actisis1_UV', '*Sistema2024', 'actisis1_BDSIRUC');

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar la consulta para obtener los usuarios
$sql = "SELECT IDUsuario, Nombre FROM USUARIOS";
$result = $conn->query($sql);

// Generar las opciones para el select
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='{$row['IDUsuario']}'>{$row['Nombre']}</option>";
    }
} else {
    echo "<option value='' disabled>No hay usuarios disponibles</option>";
}

// Cerrar la conexión
$conn->close();
?>