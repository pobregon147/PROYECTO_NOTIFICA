<?php
$serverName = "servidornotificaciones.database.windows.net";
$database = "bdnotificaciones";
$username = "administradrosql";
$password = "5720805Po";

// Conexión a la base de datos utilizando PDO
try {
    $conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];

// Insertar los datos en la base de datos
try {
    $sql = "INSERT INTO tabla_registro (nombre, apellido, email, telefono, edad, genero) 
            VALUES ('$nombre', '$apellido', '$email', '$telefono', '$edad', '$genero')";
    $conn->exec($sql);
    echo "Registro insertado correctamente";
} catch (PDOException $e) {
    echo "Error al insertar el registro: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>
