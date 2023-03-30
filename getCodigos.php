
<?php

require 'conexion.php';

// Término de búsqueda
$searchTerm = $_GET['term'];

// Búsqueda en la base de datos
$stmt = $conn->prepare("SELECT TIPO_DOC FROM registros WHERE TIPO_DOC LIKE :searchTerm");
$stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
$stmt->execute();

// Resultados de búsqueda
$data = array();
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row['TIPO_DOC'];
    }
}

// Devolver resultados en formato JSON
echo json_encode($data);
?>