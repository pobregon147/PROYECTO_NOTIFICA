<?php
require 'conexion.php';

try {
    $stmt = $conn->query("SELECT * FROM registros");
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>