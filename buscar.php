<?php
$serverName = "servidornotificaciones.database.windows.net";
$database = "bdnotificaciones";
$username = "administradorsql";
$password = "5720805Po";

// Conexión a la base de datos utilizando PDO
try {
    $conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

// Obtenerel valor de la ID enviada
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
// Realizar una consulta SQL para buscar los nombres y apellidos correspondientes a la ID
$consulta = $conn->prepare("SELECT nombre, apellido FROM registros WHERE id = :id");
$consulta->bindParam(":id", $id);
$consulta->execute();

// Obtener los nombres y apellidos encontrados
if ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nombre = $fila["nombre"];
    $apellido = $fila["apellido"];
}

// Devolver una respuesta JSON con los valores correspondientes
$response = array("nombre" => $nombre, "apellido" => $apellido);
echo json_encode($response);
?>