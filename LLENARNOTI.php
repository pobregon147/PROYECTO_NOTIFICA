<?php
// Conectar a la base de datos
require 'conexion.php';

// Obtener los datos de la notificación del formulario
$direccion = $_POST['direccion'];
$distrito = $_POST['distrito'];
$notificador = 'PEDRO OBREGON'; // valor fijo
$fecha_noti = date('Y-m-d'); // fecha actual
$estado = 'NOTIFICADO'; // valor fijo
$id = $_POST['N_CARGOS'];

// Ejecutar la consulta SQL
$stmt = $conn->prepare("UPDATE registros SET DIRECCION = :direccion, DISTRITO = :distrito, NOTIFICADOR = :notificador, FECHA_NOTI = :fecha_noti, ESTADO = :estado WHERE N_CARGOS = :N_CARGOS");
$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':distrito', $distrito);
$stmt->bindParam(':notificador', $notificador);
$stmt->bindParam(':fecha_noti', $fecha_noti);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':N_cARGOS', $id);
$stmt->execute();

// Redireccionar a la página anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
