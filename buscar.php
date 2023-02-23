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

if (isset($_POST['searchValue'])) {
  $searchValue = $_POST['searchValue'];

  // Realizar la búsqueda en la base de datos
  $sql = "SELECT id, nombre, apellido, direccion, distrito, edad, fecha_nacimiento, genero, email, telefono, comentario FROM registros WHERE nombre LIKE :searchValue OR apellido LIKE :searchValue";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':searchValue', '%' . $searchValue . '%', PDO::PARAM_STR);
  $stmt->execute();

  // Crear una tabla HTML con los resultados de la búsqueda
  $tableHtml = '';
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $tableHtml .= '<tr>';
    $tableHtml .= '<td>' . $row['id'] . '</td>';
    $tableHtml .= '<td>' . $row['nombre'] . '</td>';
    $tableHtml .= '<td>' . $row['apellido'] . '</td>';
    $tableHtml .= '<td>' . $row['direccion'] . '</td>';
    $tableHtml .= '<td>' . $row['distrito'] . '</td>';
    $tableHtml .= '<td>' . $row['edad'] . '</td>';
    $tableHtml .= '<td>' . $row['fecha_nacimiento'] . '</td>';
    $tableHtml .= '<td>' . $row['genero'] . '</td>';
    $tableHtml .= '<td>' . $row['email'] . '</td>';
    $tableHtml .= '<td>' . $row['telefono'] . '</td>';
    $tableHtml .= '<td>' . $row['comentario'] . '</td>';
    $tableHtml .= '</tr>';
  }

  // Devolver la tabla HTML
  echo $tableHtml;
}
?>
