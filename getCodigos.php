<?php

    require 'conexion.php';

    $TIPOC_DOC = $_POST["TIPO_DOC"];

    $sql = "SELECT TIPO_DOC FROM registros WHERE TIPO_DOC LIKE ?";
    $query = $conn->prepare($sql);
    $query->execute([$TIPO_DOC . '%']);
    
    $html = "";
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        $html .="<li>". $row["TIPO_DOC"] . "</li>";
    }
    echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>