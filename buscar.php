<?php
    // Conexión a la base de datos y preparación de la consulta SQL
    $pdo = new PDO('mysql:host=servidornotificaciones.database.windows.net;dbname=bdnotificaciones', 'administradorsql', '5720805Po');
    $stmt = $pdo->prepare('SELECT nombre, apellido FROM registros WHERE id = :id');
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Devolver los nombres y apellidos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($result);
    ?>
    