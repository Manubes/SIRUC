<?php
// Incluir la conexión a la base de datos
$servername = "localhost";
$username = "actisis1_UV";
$password = "*Sistema2024";
$dbname = "actisis1_BDSIRUC";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si hay errores de conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del artículo desde la URL
$id_articulo = isset($_GET['id_articulo']) ? $_GET['id_articulo'] : 0;

// Verificar que el ID del artículo no esté vacío o inválido
if ($id_articulo == 0) {
    die("ID del artículo no válido.");
}

// Consultar el PDF asociado al artículo
$sql = "SELECT Archivo FROM ARTICULOS WHERE IDArticulo = '$id_articulo'";
$result = $conn->query($sql);

// Si el artículo tiene un archivo PDF
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pdf_data = $row['pdf_archivo'];

    // Verificar si el archivo es binario
    if ($pdf_data) {
        // Enviar los encabezados correctos para la descarga del archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="articulo_'.$id_articulo.'.pdf"');
        echo $pdf_data;
    } else {
        echo "No se encontró el PDF asociado al artículo.";
    }
} else {
    echo "No se encontró el artículo con ese ID.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>