<?php
// obtener los parámetros de la solicitud AJAX
$id = $_POST['id'];
$value = $_POST['value'];

try {
    $serverName = "servidornotificaciones.database.windows.net";
    $database = "bdnotificaciones";
    $username = "administradorsql";
    $password = "5720805Po";

    $conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // buscar los valores correspondientes en la base de datos
    $stmt = $conn->prepare("SELECT $id FROM registros WHERE $id LIKE :value");
    $stmt->bindValue(':value', $value . '%', PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // construir la lista desplegable con los valores encontrados
    $output = '';
    foreach ($result as $row) {
        $output .= '<div class="autocomplete_list_item">' . $row[$id] . '</div>';
    }
    $output = '<div class="autocomplete_list">' . $output . '</div>';

    // enviar la respuesta al cliente
    echo $output;
} catch (PDOException $e) {
    // manejar excepciones de la base de datos
    echo "Error de la base de datos: " . $e->getMessage();
}
?>