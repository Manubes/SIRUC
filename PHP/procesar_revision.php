<?php
// Incluir la conexi車n a la base de datos
$servername = "localhost";
$username = "actisis1_UV";
$password = "*Sistema2024";
$dbname = "actisis1_BDSIRUC";

// Crear conexi車n
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si hay errores de conexi車n
if ($conn->connect_error) {
    die("Conexi車n fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id_articulo = $_POST['articulo'];
$id_revisor = $_POST['revisor'];
$calificacion = $_POST['calificacion'];
$comentario = $_POST['comentario'];
$estatus = $_POST['estatus'];

// Insertar los datos de la revisi車n en la tabla REVISIONES
$sql_revision = "INSERT INTO REVISIONES (IDArticulo, IDRevisor, Calificaci車n, Comentario, Fecha)
                 VALUES ('$id_articulo', '$id_revisor', '$calificacion', '$comentario', NOW())";

if ($conn->query($sql_revision) === TRUE) {
    // Actualizar el estatus del art赤culo
    $sql_update = "UPDATE ARTICULOS SET Estatus = '$estatus' WHERE IDArticulo = '$id_articulo'";
    $conn->query($sql_update);
    
    echo "Revisi車n guardada y estatus actualizado.";
} else {
    echo "Error al guardar la revisi車n: " . $conn->error;
}

// Cerrar la conexi車n a la base de datos
$conn->close();
?>