<?php
// Conexi��n a la base de datos
$conn = new mysqli('localhost', 'actisis1_UV', '*Sistema2024', 'actisis1_BDSIRUC');

// Verificar conexi��n
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario_id = $_POST['usuario_id'];
$tema_id = $_POST['tema_id'];
$titulo = $_POST['titulo'];
$resumen = $_POST['resumen'];
$palabras_clave = $_POST['palabras_clave'];
$fecha = date('Y-m-d'); // Fecha actual

// Manejo del archivo PDF
$archivo_pdf = $_FILES['archivo_pdf']['tmp_name'];
$archivo_pdf_contenido = file_get_contents($archivo_pdf);

// Preparar la consulta para insertar el art��culo
$stmt = $conn->prepare("INSERT INTO ARTICULOS(IDtema, IDUsuario, Fecha, Titulo, Resumen, PalabrasClave, Archivo) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iisssss", $tema_id, $usuario_id, $fecha, $titulo, $resumen, $palabras_clave, $archivo_pdf_contenido);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Artículo egistrado exitosamente.";
} else {
    echo "Error al registrar el artículo: " . $stmt->error;
}

// Cerrar la conexi��n
$stmt->close();
$conn->close();
?>