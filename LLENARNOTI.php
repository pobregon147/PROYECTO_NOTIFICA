<?php
require 'conexion.php';
// Obtener los valores enviados por la petición
$notificador = $_POST['notificador'];
$fecha_noti = $_POST['fecha_noti'];
$estado = $_POST['estado'];
$direccion = $_POST['direccion'];
$distrito = $_POST['distrito'];


try {
    $conn = new PDO($database, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Realizar el registro en la base de datos
    $stmt = $conn->prepare("INSERT INTO registros (NOTIFICADOR, FECHA_NOTI, ESTADO, DIRECCION, DISTRITO) VALUES (:notificador, :fecha_noti, :estado, :direccion, :distrito)");
    $stmt->bindParam(':notificador', $notificador);
    $stmt->bindParam(':fecha_noti', $fecha_noti);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':distrito', $distrito);
    $stmt->execute();

    // Mostrar mensaje de éxito si el registro fue exitoso
    echo "Notificación registrada con éxito";
} catch(PDOException $e) {
    // Mostrar mensaje de error si hubo algún problema con el registro
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

