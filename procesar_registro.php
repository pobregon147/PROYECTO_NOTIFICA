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
$NOMBRES = $_POST['NOMBRES'];
$DIRECCION = $_POST['DIRECCION'];
$DISTRITO = $_POST['DISTRITO'];
$IE = $_POST['IE'];
$TIPO_DOC = $_POST['TIPO_DOC'];
$AREA = $_POST['AREA'];
$NUM_RD = $_POST['NUM_RD'];
$FECHA_DOC = $_POST['FECHA_DOC'];
$EXPEDIENTE = $_POST['EXPEDIENTE'];
$ASUNTO = $_POST['ASUNTO'];

// Insertar los datos en la base de datos
try {
    $sql = "INSERT INTO registros (NOMBRES, DIRECCION, DISTRITO, IE, TIPO_DOC, AREA, NUM_RD, FECHA_DOC, EXPEDIENTE, ASUNTO) 
            VALUES ('$NOMBRES', '$DIRECCION', '$DISTRITO', '$IE', '$TIPO_DOC', '$AREA', '$NUM_RD', '$FECHA_DOC', '$EXPEDIENTE', '$ASUNTO')";
    $conn->exec($sql);
    // Redirigir al usuario a la página de registro y mostrar un mensaje de confirmación
    header("Location: registro.php?mensaje=Registrado correctamente");
} catch (PDOException $e) {
    echo "Error al insertar el regiñstro: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>
