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
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];

// Insertar los datos en la base de datos
try {
    $sql = "INSERT INTO registros (nombre, apellido, email, telefono, edad, genero) 
            VALUES ('$nombre', '$apellido', '$email', '$telefono', '$edad', '$genero')";
    $conn->exec($sql);
    // Redirigir al usuario a la página de registro y mostrar un mensaje de confirmación
    header("Location: registro.php?mensaje=Registrado correctamente");
} catch (PDOException $e) {
    echo "Error al insertar el registro: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>
