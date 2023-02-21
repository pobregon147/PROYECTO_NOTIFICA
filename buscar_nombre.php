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

// Obtener el ID del usuario enviado desde el formulario
$id = $_POST["id"];

// Consultar la base de datos para obtener el nombre y apellido del usuario con el ID especificado
$query = "SELECT nombre, apellido FROM registros WHERE id = :id";
$statement = $conn->prepare($query);
$statement->bindParam(':id', $id);
$statement->execute();
$datos_usuario = $statement->fetch(PDO::FETCH_ASSOC);

// Devolver los datos del usuario en formato JSON
echo json_encode($datos_usuario);

// Cerrar la conexión a la base de datos
$conn = null;
?>