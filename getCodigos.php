
<?php

require 'conexion.php';

// Consulta para obtener los valores de TIPO_DOC
$sql = "SELECT DISTINCT TIPO_DOC FROM registros";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Devuelve los resultados en formato JSON
echo json_encode($results);
?>