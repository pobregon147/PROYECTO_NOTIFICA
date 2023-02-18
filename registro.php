<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
<head>
        <title>Formulario de registro</title>
    </head>
    <body>
    <button id="btn-modal">Registrar usuario</button>
    <div id="modal" class="modal">
  <div class="modal-content">
  <form method="post" action="procesar_registro.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br>
            
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required><br>
            
            <label for="genero">Género:</label>
            <select id="genero" name="genero">
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select><br>
            
            <input type="submit" value="Registrar">
  </div>
</div>
        

            <?php
if (isset($_GET['mensaje'])) {
    echo "<p>" . $_GET['mensaje'] . "</p>";
}
?>
        </form>
        <script src="modal.js"></script>ñ
</body>
</html>


