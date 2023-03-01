<?php
$serverName = "servidornotificaciones.database.windows.net";
$database = "bdnotificaciones";
$username = "administradorsql";
$password = "5720805Po";

// Conexión a la base de datos y preparación de la consulta SQL
$conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);
$stmt = $pdo->prepare('SELECT nombre, apellido FROM registros WHERE id = :id');
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Devolver los nombres y apellidos en formato JSON
header('Content-Type: application/json');
echo json_encode($result);
?>
