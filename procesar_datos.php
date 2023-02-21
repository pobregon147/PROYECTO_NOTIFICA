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

if (isset($_POST['funcion']) && $_POST['funcion'] == 'buscarNombre') {
    $id = $_POST['id'];
    buscarNombre($id);
}


// Obtener los datos del formulario
$id = $_POST['id'];
$direccion = $_POST['direccion'];
$distrito = $_POST['distrito'];
$fecha = $_POST['fecha'];
$comentario = $_POST['comentario'];

// Insertar los datos en la base de datos
try {
    $comentario = str_replace("'", "\'", $comentario);
    $sql = "UPDATE registros SET direccion='$direccion', distrito='$distrito', fecha_nacimiento='$fecha', comentario='$comentario' WHERE id=$id";
    $conn->exec($sql);
    // Redirigir al usuario a la página de registro y mostrar un mensaje de confirmación
    header("Location: registro.php?mensaje=Datos Registrados");
} catch (PDOException $e) {
    echo "Error al insertar el dato: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>