<?php
try {
    $serverName = "servidornotificaciones.database.windows.net";
    $database = "bdnotificaciones";
    $username = "administradorsql";
    $password = "5720805Po";

    $conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM registros");
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARGO DE NOTIFICACIONES</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalusuario">Registrar usuario</button>

<div class="modal fade" id="modalusuario" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="miModalLabel">Registrar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" action="procesar_registro.php">

      <div class="form-row">
            <div class="form-group col-md-6">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br>
            </div>
      </div>

      <div class="form-row">        
            <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br>
            </div>
      </div>    

      <div class="form-row"> 
            <div class="form-group col-md-6">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="genero">Género:</label>
            <select id="genero" name="genero" class="form-control">
              <option selected>Selecciona</option>
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
              <option value="otro">Otro</option>
            </select><br>
            </div>
      </div>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" value="Registrar" class="btn btn-primary">Registrar</button>
        
       </form>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldatos">Registrar datos</button>

<div class="modal fade" id="modaldatos" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="miModalLabel">Registrar datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" action="procesar_datos.php">

      <div class="form-row">
            <div class="form-group col-md-6">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
            <button type="button" class="btn btn-primary" id="buscar">Buscar</button>
            </div><br>
              <input type="text" id="nombre" name="nombre" class="form-control" readonly>
              <input type="text" id="apellido" name="apellido" class="form-control" readonly><br>
      </div>

      <div class="form-row">
            <div class="form-group col-md-6">
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="distrito">Distrito:</label>
            <input type="text" id="distrito" name="distrito" required><br>
            </div>
      </div>

      <div class="form-row">        
            <div class="form-group col-md-6">
            <label for="fecha">Fecha de Nacimiento:</label>
            <input type="date" id="fecha" name="fecha" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="comentario">Comentario:</label>
            <input type="text" id="comentario" name="comentario" required><br>
            </div>
      </div>    
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" value="Registrar" class="btn btn-primary">Registrar</button>
      </form>
      </div>
    </div>
  </div>
</div>

<input type="text" id="searchInput" placeholder="Buscar por nombre"><br>

<table id="searchResults">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DIRECCION</th>
            <th>DISTRITO</th>
            <th>EDAD</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>GENERO</th>
            <th>EMAIL</th>
            <th>TELEFONO</th>
            <th>COMENTARIO</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($registros as $registro): ?>
            <tr>
                <td><?= $registro['id'] ?></td>
                <td><?= $registro['nombre'] ?></td>
                <td><?= $registro['apellido'] ?></td>
                <td><?= $registro['direccion'] ?></td>
                <td><?= $registro['distrito'] ?></td>
                <td><?= $registro['edad'] ?></td>
                <td><?= date('d-M-Y', strtotime($registro['fecha_nacimiento'])) ?></td>
                <td><?= $registro['genero'] ?></td>
                <td><?= $registro['email'] ?></td>
                <td><?= $registro['telefono'] ?></td>
                <td><?= $registro['comentario'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script>
// Obtener el elemento de entrada y la tabla
var input = document.getElementById("searchInput");
var table = document.getElementById("searchResults");

// Agregar un evento "keyup" al input
input.addEventListener("keyup", function() {
  // Obtener el valor del input de búsqueda
  var searchText = input.value.toLowerCase();

  // Iterar a través de las filas de la tabla
  for (var i = 1; i < table.rows.length; i++) {
    var row = table.rows[i];
    var name = row.cells[1].textContent.toLowerCase();
    var surname = row.cells[2].textContent.toLowerCase();

    // Ocultar la fila si no coincide con el valor de búsqueda
    if (name.indexOf(searchText) === -1 && surname.indexOf(searchText) === -1) {
      row.style.display = "none";
    } else {
      row.style.display = "";
    }
  }
});
</script>

<script>
  $(document).ready(function() {
  $('#buscar').click(function() {
    var id = $('#id').val();
    $.ajax({
      url: 'buscar.php',
      method: 'POST',
      data: { id: id },
      dataType: 'json',
      success: function(response) {
        $('#nombre').val(response.nombre);
        $('#apellido').val(response.apellido);
        $('#modaldatos').modal('show');
      }
    });
  });
});
</script>

</body>
</html>


