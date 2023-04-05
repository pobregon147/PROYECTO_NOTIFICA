
<?php

require 'conexion.php';

// Consulta para obtener los valores de "tipo_doc" disponibles
$stmt = $conn->prepare("SELECT DISTINCT TIPO_DOC FROM registros");
$stmt->execute();
$tipo_doc_list = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($tipo_doc_list, $row['TIPO_DOC']);
}

?>