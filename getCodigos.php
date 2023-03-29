<?php

    $serverName = "servidornotificaciones.database.windows.net";
    $database = "bdnotificaciones";
    $username = "administradorsql";
    $password = "5720805Po";

    $conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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