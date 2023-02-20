<?php
$id = $_GET["id"];
$serverName = "servidornotificaciones.database.windows.net";
$database = "bdnotificaciones";
$username = "administradorsql";
$password = "5720805Po";

// Conexión a la base de datos utilizando PDO
try {
    $conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);
    $statement = $conexion->prepare("SELECT nombre, apellido FROM registros WHERE id = $id");
    $statement->bindParam("id", $id);
    $statement->execute();
    $fila = $statement->fetch(PDO::FETCH_ASSOC);
  
    if ($fila) {
      $nombre = $fila["nombre"];
      $apellido = $fila["apellido"];
      $respuesta = array("nombre" => $nombre, "apellido" => $apellido);
      echo json_encode($respuesta);
    } else {
      $respuesta = array("nombre" => "", "apellido" => "");
      echo json_encode($respuesta);
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
?>
