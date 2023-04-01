<?php
// Obtener los datos de la notificación del formulario
$direccion = $_POST['direccion'];
$distrito = $_POST['distrito'];
$notificador = 'PEDRO OBREGON'; // valor fijo
$fecha_noti = date('Y-m-d'); // fecha actual
$estado = 'NOTIFICADO'; // valor fijo

// Conectar a la base de datos
require_once('conexion.php');

// Preparar la consulta SQL
$sql = "UPDATE registros SET DIRECCION = :direccion, DISTRITO = :distrito, NOTIFICADOR = :notificador, FECHA_NOTI = :fecha_noti, ESTADO = :estado WHERE N_CARGOS = :id";

// Obtener el ID del registro a actualizar (pasado por el formulario)
$id = $_POST['id'];

// Ejecutar la consulta SQL
$stmt = $conn->prepare($sql);
$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':distrito', $distrito);
$stmt->bindParam(':notificador', $notificador);
$stmt->bindParam(':fecha_noti', $fecha_noti);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Redireccionar a la página anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
