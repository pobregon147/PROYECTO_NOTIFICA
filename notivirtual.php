<?php
// Obtener los datos de la notificación del formulario
$direccion = $_POST['direccion'];
$distrito = $_POST['distrito'];
$notificador = $_POST['notificador']; // valor fijo
$estado = $_POST['estado']; // valor fijo

// Conectar a la base de datos
require_once('conexion.php');

// Preparar la consulta SQL
$sql = "UPDATE registros SET DIRECCION = :direccion, DISTRITO = :distrito, NOTIFICADOR = :notificador, ESTADO = :estado WHERE N_CARGOS = :n_cargos";

// Obtener el ID del registro a actualizar (pasado por el formulario)
$n_cargos = $_POST['n_cargos'];

// Ejecutar la consulta SQL
$stmt = $conn->prepare($sql);
$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':distrito', $distrito);
$stmt->bindParam(':notificador', $notificador);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':n_cargos', $n_cargos);
$stmt->execute();

// Redireccionar a la página anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);

