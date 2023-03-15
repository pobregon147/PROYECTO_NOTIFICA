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

// Obtener los datos del formulario
$N_CARGOS = $_POST['N_CARGOS'];
$NOTIFICADOR = $_POST['NOTIFICADOR'];
$FECHA_NOTI = $_POST['FECHA_NOTI'];
$RELACION = $_POST['RELACION'];
$ESTADO = $_POST['ESTADO'];
$OBSERVACION = $_POST['OBSERVACION'];

// Insertar los datos en la base de datos
try {
    $OBSERVACION = str_replace("'", "\'", $OBSERVACION);
    $sql = "UPDATE registros SET NOTIFICADOR='$NOTIFICADOR', FECHA_NOTI='$FECHA_NOTI', RELACION='$RELACION', ESTADO='$ESTADO', OBSERVACION='$OBSERVACION' WHERE N_CARGOS=$N_CARGOS";
    $conn->exec($sql);
    // Redirigir al usuario a la página de registro y mostrar un mensaje de confirmación
    header("Location: registro.php?mensaje=Datos Registrados");
} catch (PDOException $e) {
    echo "Error al insertar el dato: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>