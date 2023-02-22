<?php
$serverName = "servidornotificaciones.database.windows.net";
$database = "bdnotificaciones";
$username = "administradorsql";
$password = "5720805Po";

$conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);

// Obtenemos el valor del input
$searchValue = $_GET['q'];

// Hacemos una consulta a la base de datos
$sql = "SELECT id, nombre, apellido, direccion, distrito, edad, fecha_nacimiento, genero, email, telefono, comentario FROM registros WHERE nombre LIKE :searchValue OR apellido LIKE :searchValue";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':searchValue', '%'.$searchValue.'%');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mostramos los resultados en formato HTML
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Nombre</th>';
echo '<th>Apellido</th>';
echo '<th>Email</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($results as $result) {
    echo '<tr>';
    echo '<td>' . $result['id'] . '</td>';
    echo '<td>' . $result['nombre'] . '</td>';
    echo '<td>' . $result['apellido'] . '</td>';
    echo '<td>' . $result['direccion'] . '</td>';
    echo '<td>' . $result['distrito'] . '</td>';
    echo '<td>' . $result['edad'] . '</td>';
    echo '<td>' . $result['fecha_nacimiento'] . '</td>';
    echo '<td>' . $result['genero'] . '</td>';
    echo '<td>' . $result['email'] . '</td>';
    echo '<td>' . $result['telefono'] . '</td>';
    echo '<td>' . $result['comentario'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
