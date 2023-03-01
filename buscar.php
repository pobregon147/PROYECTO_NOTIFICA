<?php
try {
    $serverName = "servidornotificaciones.database.windows.net";
    $database = "bdnotificaciones";
    $username = "administradorsql";
    $password = "5720805Po";

    $conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT nombre, apellido FROM tabla WHERE id = :id");
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Devolver los nombres y apellidos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($result);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>