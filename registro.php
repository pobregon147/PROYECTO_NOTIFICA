<html>
    <head>
        <title>Formulario de registro</title>
    </head>
    <body>
        <h1>Formulario de registro</h1>
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
        </form>
    </body>
</html>
