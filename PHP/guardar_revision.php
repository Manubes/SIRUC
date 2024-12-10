<?php
// Conexi��n directa a la base de datos
$servername = "localhost";
$username = "actisis1_UV";
$password = "*Sistema2024";
$dbname = "actisis1_BDSIRUC";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexi��n
if ($conn->connect_error) {
    die("Error de conexi��n: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $IDArticulo = $_POST['IDArticulo'];
    $IDUsuario = $_POST['IDUsuario'];
    $Calificacion = $_POST['Calificacion'];
    $Comentario = $_POST['Comentario'];
    $Estatus = $_POST['Estatus'];

    // Insertar revisi��n
    $insert_review = $conn->prepare("INSERT INTO REVISIONES(IDArticulo, IDRevisor, Calificacion, Comentarios, Fecha) VALUES (?, ?, ?, ?, NOW())");
    $insert_review->bind_param("iiis", $IDArticulo, $IDUsuario, $Calificacion, $Comentario);
    $insert_review->execute();

    // Actualizar estatus del art��culo
    $update_article = $conn->prepare("UPDATE ARTICULOS SET Estatus = ? WHERE IDArticulo = ?");
    $update_article->bind_param("si", $Estatus, $IDArticulo);
    $update_article->execute();

    if ($insert_review && $update_article) {
        echo "Revisi��n guardada exitosamente.";
    } else {
        echo "Error al guardar la revisi��n.";
    }
}

$conn->close();
?>