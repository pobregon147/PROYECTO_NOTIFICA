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

// Comprobamos si se ha enviado la solicitud
if (isset($_POST['submit'])) {
	// Obtenemos el valor del input de ID
	$id = $_POST['id'];

	// Consulta a la base de datos
	$stmt = $pdo->prepare("SELECT nombre, apellido FROM registros WHERE id = :id");
	$stmt->execute(['id' => $id]);

	// Obtenemos el resultado de la consulta
	$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

	// Mostramos el resultado en los inputs correspondientes
	if ($resultado) {
		echo '<script>document.getElementById("nombre").value="' . $resultado['nombre'] . '";</script>';
		echo '<script>document.getElementById("apellido").value="' . $resultado['apellido'] . '";</script>';
	} else {
		echo '<script>alert("No se encontraron resultados.");</script>';
	}
}
?>